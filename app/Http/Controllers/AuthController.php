<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin');
        }
        return redirect()->route('login')->withErrors('Login ve ya password sefdi');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');

    }
}
