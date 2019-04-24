<!DOCTYPE html>
<html>
<head>
	<title>Kasier</title>
</head>
<body>

	<h2>Order List</h2>

	<a href="{{ route('orders.create') }}">Create Order</a>

	<table>
		<thead>
			<tr>
				<th>Table Number</th>
				<th>Payment</th>
				<th>Total</th>
				<th>Created By</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->table_number }}</td>
				<td>{{ $order->payment->name }}</td>
				<td>{{ $order->total }}</td>
				<td>{{ $order->user->name }}</td>
				<td>
					<a href="{{ route('orders.show', $order->id) }}">Detail</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>