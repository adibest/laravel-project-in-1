@extends('layouts.app')

@section('title', 'Order Details')

@section('content')

	<div class="row">
		<div class="col-md-8">

			<!-- BASIC TABLE -->
			<div class="panel">
				<div class="panel-heading">
					<h3>Order Details List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('order_details.create') }}">Create</a>
				</div>
				<div class="panel-body">
					<table class="table table-condensed">
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

		</div>
	</div>


@endsection