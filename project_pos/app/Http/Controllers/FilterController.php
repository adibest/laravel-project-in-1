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

            $count = count($orders);

            if ($count > 0) {
                return view('filters.index', compact('orders', 'users'));
            } else {
                return redirect('admin/filters')->with('danger', 'No data available');
            }
        } else {
    	   $orders = Order::where('user_id', $user)->whereYear('created_at', '=', date($year))->whereMonth('created_at', '=', date($month))->get();

           $count = count($orders);

            if ($count > 0) {
                return view('filters.index', compact('orders', 'users'));
            } else {
                return redirect('admin/filters')->with('danger', 'No data available');
            }
        }
    	// dd($year, $user, $orders);

    	
    }

    public function print(Request $request)
    {
    	$year 	= $request->year;
    	$month 	= $request->month;
    	$user 	= $request->user_id;

        $users = User::all();
        $orders  = new Order();

        if ($year) {
            $orders = $orders->whereYear('created_at', $year);
        }
        if ($month) {
            $orders = $orders->whereMonth('created_at', $month);
        }
        if ($user) {
            $orders = $orders->where('user_id', $user);
        }
        $orders = $orders->get();
        $count = count($orders);
        if ($count > 0) {
            $pdf = PDF::loadView('filters.print', compact('orders', 'users'));
        	return $pdf->setPaper('a4', 'landscape')->stream();            
        } else {
            return redirect('/admin/filters')->with('danger', 'No data available');;
        }

    }

    public function export(Request $request) 
    {
        $year   = $request->year;
        $month  = $request->month;
        $user   = $request->user_id;

        $users = User::all();
        $orders  = new Order();

        if ($year) {
            $orders = $orders->whereYear('created_at', $year);
        }
        if ($month) {
            $orders = $orders->whereMonth('created_at', $month);
        }
        if ($user) {
            $orders = $orders->where('user_id', $user);
        }
        $orders = $orders->get();
        $count = count($orders);
        if ($count > 0) {
            return Excel::download(new OrdersExport($year, $month, $user), 'repoerts.xlsx');        
        } else {
            return redirect('/admin/filters')->with('danger', 'No data available');;
        }
    }
}
