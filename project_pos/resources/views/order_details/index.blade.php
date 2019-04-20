@extends('layouts.app')

@section('title', 'Order Details')

@section('content')


			<!-- BASIC TABLE -->
			<div class="box">
				<div class="box-header with-border">
					<h3>Order Details List</h3>
					<span><a class="btn btn-primary pull-right" href="{{ route('order_details.create') }}">Create</a></span>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Order Id</th>
								<th>Product Id</th>
								<th>Quantity</th>
								<th>Note</th>
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
						@foreach($data as $details)
						<tbody>
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $details->order_id }}</td>
								<td>{{ $details->product_id }}</td>
								<td>{{ $details->quantity }}</td>
								<td>{{ $details->note }}</td>
								<td>{{ $details->created_at }}</td>
								<td>
									<form method="post" action="{{ route('order_details.destroy', $details->id) }}">
										<a class="btn btn-sm btn-primary" href="{{ route('order_details.edit', $details->id) }}">Edit</a>
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



@endsection

@foreach( $order->order_detail as $detail ) {{-- because has Many --}}

@endforeach