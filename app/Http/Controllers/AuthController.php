<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function check_login(Request $request)
    {
        // validate the form data
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            session()->flash('success', true);

            return redirect()->intended('admin');
        }

        return redirect()->back()->with('error', 'Email or Password is incorrect');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You are logged out');
    }
}
