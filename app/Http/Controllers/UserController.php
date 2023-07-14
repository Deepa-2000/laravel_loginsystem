<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    function index(){
        return view('login');

    }
    function registration(){
        return view('registration');
    }
    function validate_registration(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $data=$req->all();
        User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password'])
        ]);

        return redirect('login')->with('success','Registration Completed, now you can login...!');
    }
    function validate_login(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials=$req->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect('dashboard');
        }
        return redirect('login')->with('success', 'Login details are not valid!!');

    }
    function dashboard(){
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect('login')->with('success','you are not allowed to access!!');

    }
    function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

}
