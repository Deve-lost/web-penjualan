<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
    	return view('login.index');
    }

    public function postlogin(Request $request)
    {
    	// dd($request->all());
    	if (Auth::attempt($request->only('username','password'))) {
    		return redirect('/dashboard');
    	}

    	return redirect('/login');
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/login');
    }
}
