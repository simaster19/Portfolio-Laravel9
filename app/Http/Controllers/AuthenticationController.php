<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

    public function index(){
        return view('dashboards.login');
    }


    public function login(Request $request){

        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'min:3'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
       
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
