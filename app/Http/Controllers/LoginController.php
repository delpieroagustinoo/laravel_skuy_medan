<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        $judul = 'SkuyMedan | Login';
        return view('login.index',['judul'=>$judul]);

    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([

            'email' => 'required|email:dns',
            'password' => 'required'
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('Admin/blogspot');
        }

        return back()->with('loginError', 'Login Gagal!');
    }


    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
