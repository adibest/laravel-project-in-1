<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Model\Order;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($year, $month, $user)
    {
        $this->year = $year;
        $this->month = $month;
        $this->user = $user;
    }

    public function collection(Request $request)
    {
    	$year 	= $request->year;
    	$month 	= $request->month;
    	$user 	= $request->user_id;

    	$orders = Order::where('user_id', $user)->whereYear('created_at', '=', date($year))->whereMonth('created_at', '=', date($month))->get();
        return $orders;
    }

    public function view(): View
    {
        if ($this->user == 0) {
            return view('filters.print', [
                'orders' => Order::all()
            ]);
        } else {
            return view('filters.print', [
                'orders' => Order::where([
                    'user_id' => $this->user
                ])->get()
            ]);
        }
    }
}
