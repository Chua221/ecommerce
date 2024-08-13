<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function ViewMain(){
        return view('main');
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

    public function RegisterFunction(Request $request){
        $otpnumber=rand(100000,999999);
        $insert=$request->validate([
            'name'=>'required',
            'passwored'=>"'required'|'comfirmed'|'min:6'",
            'email'=>['required',Rule::unique('users','email')],
        ]);
        $insert['password']=bcrypt($insert['password']);
        
    }
}
