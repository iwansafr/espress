<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $validate = [
        'email' => 'required',
        'password' => 'required'
    ];
    public function login()
    {
        return view('auth.login');
    }
    public function check_login(Request $request)
    {
        $request->validate($this->validate);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect('dashboard');
        }else{
            return back()->with(['message'=>'Email dan Sandi tidak sesuai']);
        }
    }
}
