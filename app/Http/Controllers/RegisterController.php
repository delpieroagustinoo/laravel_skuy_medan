<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function index(){

        $judul = 'SkuyMedan | Register';
        return view('register.index',['judul'=>$judul]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'username' => 'required|min:6|max:18|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('Admin/blogspot')->with('success', 'Registrasi Berhasil! Silahkan Logout kemudian Login');
    }
}
