<?php

namespace App\Http\Controllers;

use App\Mail\emailverify;
use App\Models\address;
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

    public function ViewProfile(){
        return view('profile');
    }

    public function ViewAddress(){
        return view('address',[
            'addressdata'=>address::where('user_id','=',Auth::user()->id)->get()
        ]);
    }

    public function ViewAddAddress(){
        return view('addaddress');
    }

    public function ViewEdit($id){
        return view('editaddress',[
        'editaddress'=>address::find($id)
        ]);
    }

    public function ViewCart(){
        return view('cart');
    }

    public function ViewVeg($id){
        return view('vegetable',[
            'vegetable'=>vegetables::find($id)
        ]);
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
            'mass'=>'required',
            'price'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $add['image']=$request->file('image')->store('logos','public');
        }
        vegetables::create($add);
        return redirect('/add')->with('message','The vegetable is already added');
    }

    public function CompleteProfile(Request $request){
        $profile=$request->validate([
            'no_ic'=>'required',
            'gender'=>'required',
        ]);
        User::where('id','=',Auth::user()->id)->update($profile);
        return redirect('/')->with('message','Profile is already changed');
    }

    public function AddAddressFunction(Request $request){
        $newaddress=$request->validate([
            'home'=>'required',
            'adress1'=>'required',
            'adress2'=>'required',
            'poscode'=>'required|min:5',
            'city'=>'required',
            'state'=>'required',
        ]);
        $newaddress['user_id']=Auth::user()->id;
        address::create($newaddress);
        return redirect('/adress')->with('message','New address is already create');
    }

    public function DeleteFunction(Request $request,address $id){
        $id->delete();
        return back()->with('message','delete successful'); 
    }

    public function EditFunction(Request $request,address $id){
        $editaddress=$request->validate([
            'home'=>'required',
            'adress1'=>'required',
            'adress2'=>'required',
            'poscode'=>'required|min:5',
            'city'=>'required',
            'state'=>'required',
        ]);
            $id->update($editaddress);
            return redirect('/adress')->with('message','Edit address successful');
    }


}
