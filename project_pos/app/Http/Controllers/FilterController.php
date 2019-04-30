<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\User;
use PDF;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

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

        $users = User::all();

        if ($user == 0) {
            $orders = Order::whereYear('created_at', '=', date($year))->whereMonth('created_at', '=', date($month))->get();
        } else {
    	   $orders = Order::where('user_id', $user)->whereYear('created_at', '=', date($year))->whereMonth('created_at', '=', date($month))->get();
        }
    	// dd($year, $user, $orders);

    	return view('filters.index', compact('orders', 'users'));
    }

    public function print(Request $request)
    {
    	$year 	= $request->year;
    	$month 	= $request->month;
    	$user 	= $request->user_id;

        //$orders = Order::where('user_id', $user)->get();
    	$orders = Order::all();

    	$pdf = PDF::loadview('filters.print',[
            'orders' => $orders
        ]);
    	// return $pdf->download('laporan-orders-pdf');
    	return $pdf->setPaper('a4', 'landscape')->stream();
    }

    public function export() 
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}
