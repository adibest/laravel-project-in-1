<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\User;

class FilterController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth')->only('index');
	}


	public function index()
	{
	    $users  = User::all();
	    $orders = Order::orderBy('created_at', 'desc')->paginate(5);
	    return view('filters.index', compact('orders', 'users'));
	}

    public function show(Request $request)
    {
    	// $users  = User::all();
    	$year 	= $request->year;
    	$month 	= $request->month;
    	$user 	= $request->user_id;


    	$orders = Order::where('user_id', $user)->whereYear('created_at', '=', date($year))->whereMonth('created_at', '=', date($month))->get();
    	// dd($year, $user, $orders);

    	return view('filters.index', compact('orders'));
    }
}
