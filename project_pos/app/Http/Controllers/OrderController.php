<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Payment;
use App\Model\Product;
use App\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Order::orderBy('created_at', 'desc')->get();
        $data = Order::orderBy('created_at', 'desc')->get();
        $datas = OrderDetail::orderBy('id')->get();

        return view('orders.index', compact('data', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment = Payment::all();
        $user = User::all();
        $product = Product::all();
        $order = Order::all();

        return view('orders.create', compact('payment', 'user', 'product', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product       = Product::find($request->product_id);
        $quantity      = $request->quantity;
        $count         = count($request->product_id);
        $note          = $request->note;
        $item          = $request->product_id;

        $request->merge([
            'user_id'  => auth()->user()->id,
        ]);

        $order         = $request->only('table_number', 'payment_id', 'user_id');
        $orderRan      = Order::create($order); 
        
        for ($i=0; $i < $count; $i++) { 
            $request->merge([
                'order_id'      => $orderRan->id,
                'product_id'    => $item[$i],
                'quantity'      => $quantity[$i],
                'note'          => $note[$i],
                'subtotal'      => $product[$i]->price * $quantity[$i],
            ]);

            $orderDetail        = $request->only('order_id', 'product_id' , 'quantity', 'note', 'subtotal');
            OrderDetail::create($orderDetail);
        
        }


        $orderTotal = OrderDetail::where('order_id', $orderRan->id)->sum('subtotal');

        Order::find($orderRan->id)->update([
            'total' => $orderTotal,
        ]);

        // Redirect or whatever you want to do here
        return redirect('admin/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::all();
        $user = User::all();
        $product = Product::all();
        $order = Order::find($id);

        return view('orders.edit', compact('payment', 'user', 'product', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderDetail::where('order_id', $id)->delete();
        Order::find($id)->delete();

        return redirect('/admin/orders');
    }
}
