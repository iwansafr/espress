<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // return view('auth.login');
    }
}
