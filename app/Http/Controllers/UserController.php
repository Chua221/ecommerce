<?php

namespace App\Http\Controllers;

use App\Mail\emailverify;
use App\Models\address;
use App\Models\carts;
use App\Models\checkout;
use App\Models\User;
use App\Models\vegetables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
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
            if ($verify->update(array('otp_time'=>'1'))) {
                return redirect()->route('login')->with('message','the otp is correct you can login now');
            }
        }else{
            return redirect('otp')->with('message','the otp is wrong');
        }
    }

    public function LoginFunction(Request $request){
        $select=$request->validate([
            'email'=>'required',
            'password'=>'required|min:6'
        ]);
        if (Auth::attempt($select)) {
            $request->session()->regenerate();
            if (Auth::user()->otp_time=='1') {
                return redirect('/')->with('message','Login successful');
            }else{
                return redirect('/otp')->with('message','the otp is correct you can login now');
            }
        }else{
            return redirect('/login')->with('message','email or password wrong');
        }
    }

    public function AdminLoginFunction(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended('/admin');
            } else {
                return redirect('/adminlogin')->with('message', 'Login failed');
            }
        
    }
    
    public function AdminLogoutFunction(Request $request){
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/adminlogin');
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
            'gender'=>'required',
        ]);
        User::where('id','=',Auth::user()->id)->update($profile);
        return redirect('/')->with('message','Profile is already changed');
    }

    public function AddAddressFunction(Request $request){
        $newaddress=$request->validate([
            'home'=>'required',
            'address1'=>'required',
            'address2'=>'required',
            'poscode'=>'required|min:5',
            'city'=>'required',
            'state'=>'required',
        ]);
        $newaddress['user_id']=Auth::user()->id;
        address::create($newaddress);
        return redirect('/address')->with('message','New address is already create');
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

    public function AddToCartsFunction(vegetables $id,Request $request){
            $condition=carts::where('user_id',Auth::user()->id)->where('veg_id',$id->id)->where('status','cart')->exists();
            if (!$condition) {
                $addtocart=$request->validate([
                    'veg_mass'=>'required',
                    'veg_price'=>'required',
                ]);
                $addtocart['user_id']=Auth::user()->id;
                $addtocart['veg_id']=$id->id;
                $addtocart['status']='cart';
                $addtocart['b_id']=0;
                carts::create($addtocart);
                return redirect('/')->with('message','Add to cart successful');
            }else {
                return redirect('/')->with('message','Cart already have this vegetable');
            }
    }   

    public function AddToCartFunction(vegetables $id,Request $request){
            $condition=carts::where('user_id',Auth::user()->id)->where('veg_id',$id->id)->where('status','cart')->exists();
            if ($condition) {
                return redirect('/')->with('message','Cart already have this vegetable');
            }else {
                carts::create([
                    'veg_mass'=>$id->mass,
                    'veg_price'=>$id->price,
                    'veg_id'=>$id->id,
                    'user_id'=>Auth::user()->id,
                    'status'=>'cart',
                    'b_id'=>0,
                ]);
                return redirect('/')->with('message','Add to cart successful');
            }
    }

    public function CheckOutFunction(Request $request){
        $checkout=checkout::where('user_id', Auth::user()->id)->selectRaw('MAX(id) as id')->first();
        if ($checkout===null) {
            $bill_time=1;
        }else{
            $bill_time=$checkout->id+1;
        }

        $update_cart=carts::where('user_id',Auth::user()->id)->where('status','cart')->update([
            'b_id'=>$bill_time,
            'status'=>'checkout',
        ]);
        if ($update_cart) {
            $insert_checkout=$request->validate([
                'total_price'=>'required',
                'deliveryOption'=>'required',
                'address'=>'required_if:deliveryOption,delivery',
            ]);
            $insert_checkout['user_id']=Auth::user()->id;
            $insert_checkout['bill_id']=$bill_time;
            if ($request->deliveryOption==='pickup') {
                $insert_checkout['address']= 0 ;
            }elseif ($request->deliveryOption==='delivery') {
                $insert_checkout['address']=address::where('home');
            }
            checkout::create($insert_checkout);
            return redirect('/')->with('message','Checkout successful');
        }
            return back()->with('message','Checkout Failed');
    }
}
