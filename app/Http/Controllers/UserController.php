<?php

namespace App\Http\Controllers;

use App\Mail\emailverify;
use App\Models\User;
use App\Models\vegetables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function ViewMain(){
        return view('main',[
            'showdata'=>vegetables::all()
        ]);
    }

    public function ViewLogin(){
        return view('login');
    }

    public function ViewRegister(){
        return view('register');
    }

    public function ViewOtp(){
        return view('otp');
    }

    public function ViewAdd(){
        return view('addvegetable');
    }

    public function RegisterFunction(Request $request){
        $otpnumber=rand(100000,999999);
        $insert=$request->validate([
            'name'=>'required',
            'password'=>'required|confirmed|min:6',
            'email'=>['required',Rule::unique('users','email')],
        ]);
        $insert['password']=bcrypt($insert['password']);
        $insert['otp']=$otpnumber;
        $user=User::create($insert);
        Auth::login($user);
        Mail::to($user->email)->send(new emailverify($user));
        return redirect('/otp')->with('message','User is already register');
    }

    public function Checkotp(Request $request){
        $verify=User::where('email','=',Auth::user()->email);
        $getotp=$verify->get();
        if ($getotp[0]->otp === $request['otp']) {
            $verify->update(array('otp_time'=>'1'));
            return redirect()->route('login')->with('message','the otp is correct you can login now');
        }
    }

    public function LoginFunction(Request $request){
        $select=$request->validate([
            'email'=>'required',
            'password'=>'required|min:6'
        ]);
        if (Auth::attempt($select)) {
            $request->session()->regenerate();
            return redirect('/')->with('message','Login successful');
        }
    }

    public function LogoutFunction(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','Logout successful');
    }

    public function AddFunction(Request $request){
        $add=$request->validate([
            'v_name'=>'required',
            'image'=>'required',
            'mess'=>'required',
            'price'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $add['image']=$request->file('image')->store('logos','public');
        }
        vegetables::create($add);
        return redirect('/')->with('message','The vegetable is already added');
    }
}
