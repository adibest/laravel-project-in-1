<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only('index');
	}

    public function index()
    {
    	$users = User::all();

    	return view('users.index', compact('users'));
    }

    public function cek()
    {
    	return 'middleware berhasil';
    }
}
