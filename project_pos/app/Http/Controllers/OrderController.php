<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Payment;
use App\Model\Product;
use App\User;
use PDF;

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
        $users = User::all();

        return view('orders.index', compact('data', 'datas', 'users'));
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

        // return view('orders.create', compact('payment', 'user', 'product', 'order'));
        return view('orders.create2', compact('payment', 'user', 'product', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $product       = Product::find($request->product_id);
        // $quantity      = $request->quantity;
        // $count         = count($request->product_id);
        // $note          = $request->note;
        // $item          = $request->product_id;

        $request->merge([
            'user_id'  => auth()->user()->id,
        ]);

        // $order         = $request->only('table_number', 'payment_id', 'user_id');
        // $orderRan      = Order::create($order); 
        
        // for ($i=0; $i < $count; $i++) { 
        //     $request->merge([
        //         'order_id'      => $orderRan->id,
        //         'product_id'    => $item[$i],
        //         'quantity'      => $quantity[$i],
        //         'note'          => $note[$i],
        //         'subtotal'      => $product[$i]->price * $quantity[$i],
        //     ]);

        //     $orderDetail        = $request->only('order_id', 'product_id' , 'quantity', 'note', 'subtotal');
        //     OrderDetail::create($orderDetail);
        
        // }


        // $orderTotal = OrderDetail::where('order_id', $orderRan->id)->sum('subtotal');

        // Order::find($orderRan->id)->update([
        //     'total' => $orderTotal,
        // ]);

        $dataOrder = $request->only('table_number', 'payment_id', 'user_id', 'total');
        $order = Order::create($dataOrder);
        $dataDetail = $request->only('product_id', 'quantity', 'subtotal', 'note');
        $countDetail = count($dataDetail['product_id']);
        for ($i=0; $i < $countDetail; $i++) { 
            
            $detail                 = new OrderDetail();
            $detail->order_id       = $order->id;
            $detail->product_id     = $dataDetail['product_id'][$i];
            $detail->quantity       = $dataDetail['quantity'][$i];
            $detail->subtotal       = $dataDetail['subtotal'][$i];
            $detail->note           = $dataDetail['note'][$i];
            $detail->save();
        }

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
        $product = Product::all();
        $order = Order::find($id);

        return view('orders.edit2', compact('payment', 'user', 'product', 'order'));
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
        $request->merge([
            'user_id'  => auth()->user()->id,
        ]);

        $dataOrder = $request->only('table_number', 'payment_id', 'user_id', 'total');
        $order = Order::find($id)->update($dataOrder);

        $dataDetail = $request->only('product_id', 'quantity', 'subtotal', 'note');
        $countDetail = count($dataDetail['product_id']);

        OrderDetail::where('order_id', $id)->delete();
        for ($i=0; $i < $countDetail; $i++) { 
            
            $detail                 = new OrderDetail();
            $detail->order_id       = $id;
            $detail->product_id     = $dataDetail['product_id'][$i];
            $detail->quantity       = $dataDetail['quantity'][$i];
            $detail->subtotal       = $dataDetail['subtotal'][$i];
            $detail->note           = $dataDetail['note'][$i];
            $detail->save();
        }
        return redirect('/admin/orders');
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

    public function print(Request $request)
    {
        // $order_details = OrderDetail::where('order_id', $id)->get();
        $id = $request->order_id;
        
        $users = User::all();
        $order_details = new OrderDetail();

        if ($id) {
            $order_details = $order_details->where('order_id', $id);
        }
        $order_details = $order_details->get();

        // dd($id,$order_details);
        $count = count($order_details);
        if ($count > 0) {
            $pdf = PDF::loadView('orders.print', compact('order_details', 'users'));
            return $pdf->setPaper('a4', 'landscape')->stream();            
        } else {
            return redirect('/admin/orders');
        }

        // $pdf = PDF::loadview('orders.print', compact('order_details', 'users'));
        // return $pdf->setPaper('a4', 'landscape')->stream();
    }
}
