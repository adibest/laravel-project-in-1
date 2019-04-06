<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

    public function loginForm()
    {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
    	$credentials = $request->only('email', 'password');
    	$check = Auth::attempt($credentials);

    	if ($check) {
    		return redirect()->intended('/santri');
    	} else {
    		return redirect()->back();
    	}
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/login');
    }
}
