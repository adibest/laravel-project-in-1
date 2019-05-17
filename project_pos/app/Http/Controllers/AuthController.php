<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\UserStoreRequest;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function form()
	{
		return view('logs.login');
	}

	public function login(Request $request)
	{
		$credentials = $request->only('email', 'password');
		$check =  Auth::attempt($credentials);

		if ($check) {
    		return redirect()->intended('/admin/home');//intended = diutamakan
    	} else {
    		return 'login gagal';
    	}
     }

     public function formreg()
     {
     	return view('logs.formreg');
     }

     public function register(UserStoreRequest $request)
     {
     	$request->merge([
            'password'      => bcrypt($request->password),
            'name'          => $request->name,
            'email'          => $request->email,
        ]);

        $user = $request->only('password','name','email');

        User::create($user);

        return redirect('admin/form')->with('success', 'Silakan login, anda telah terdaftar');
     }


    public function logout()
    {
    	Auth::logout();
    	return redirect('admin/form');
    }
}
