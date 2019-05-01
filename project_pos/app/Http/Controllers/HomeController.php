<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
    	$orders = Order::all();
    	$products = Product::all();
    	$users = User::all();

    	$countOrders = count($orders);
    	$countProducts = count($products);
    	$countUsers = count($users);


    	return view('index', compact('orders','products','users','countOrders','countProducts','countUsers'));
    }
}
