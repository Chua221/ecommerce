<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\carts;
use App\Models\checkout;
use App\Models\User;
use App\Models\vegetables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
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
        return view('profile',[
            'data'=>User::find(Auth::user()->id)
        ]);
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
        $allcart=carts::join('vegetables','carts.veg_id','=','vegetables.id')->where('user_id',Auth::user()->id)->where('status','cart')->get();
        $useraddress=address::where('user_id','=',Auth::user()->id)->get();
        return view('cart',compact('allcart','useraddress'));
    }

    public function ViewVeg($id){
        return view('vegetable',[
            'vegetable'=>vegetables::find($id)
        ]);
    }

    public function ViewAdminLogin(){
        return view('admin_login');
    }

    public function ViewHistory() {
        $history = checkout::Leftjoin('addresses', 'checkouts.address', '=', 'addresses.id')->where('checkouts.user_id', Auth::user()->id)->get();
        return view('history', compact('history'));
    }
    
}
