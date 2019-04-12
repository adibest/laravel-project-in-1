@extends('layouts.app')

@section('title', 'Orders')

@section('content')

	<div class="row">
		<div class="col-md-12">

			<!-- BASIC TABLE -->
			<div class="panel">
				<div class="panel-heading">
					<h3>Orders List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('orders.create') }}">Create</a>
				</div>
				<div class="panel-body">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Table Number</th>
								<th>Total</th>
								<th>Payment</th>
								<th>User</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
						</thead>
						@php
							$no = 1;

							function format_uang($angka){ 
							    $hasil =  number_format($angka,2, ',' , '.'); 
							    return $hasil; 
							}
						@endphp
						@foreach($data as $order)
						<tbody>
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $order->table_number }}</td>
								<td>Rp{{ format_uang($order->total) }}</td>
								<td>{{ $order->payment->name }}</td>
								<td>{{ $order->user->name }}</td>
								<td>{{ $order->created_at }}</td>
								<td>
									<form method="post" action="{{ route('orders.destroy', $order->id) }}">
										<a class="btn btn-sm btn-success" href="">Detail</a>
										<a class="btn btn-sm btn-primary" href="{{ route('orders.edit', $order->id) }}">Edit</a>
										@csrf
										@method('DELETE')
										<button class="btn btn-sm btn-danger" type="submit">Delete</button>
									</form>
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
				</div>
			</div>
			<!-- END BASIC TABLE -->

		</div>
	</div>


@endsection