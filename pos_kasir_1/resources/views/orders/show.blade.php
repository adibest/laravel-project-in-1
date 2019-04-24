<!DOCTYPE html>
<html>
<head>
	<title>Detail Order</title>
</head>
<body>

	<h2>Detail Order</h2>

	<p>Table Number: {{ $order->table_number }}</p>
	<p>Payment: {{ $order->payment->name }}</p>
	<p>Created By: {{ $order->user->name }}</p>

	<hr>

	<h4>Order Details</h4>

	@foreach($order->orderDetail as $detail)
		<p>
			{{ $detail->product->name }} 
			{{ $detail->quantity}}pcs = 
			{{ $detail->subtotal}} 
		</p>
	@endforeach

	<h3>Total: {{ $order->total }}</h3>

</body>
</html>