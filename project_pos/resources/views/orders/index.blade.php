@extends('layouts.app')

@section('title', 'Orders')

@section('content')


			<!-- BASIC TABLE -->
			<div class="box">
				<div class="box-header with-border">
					<h3>Orders List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('orders.create') }}">Create</a>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
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
										<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#{{ $order->id }}">Detail</a>
										<a class="btn btn-sm btn-primary" href="{{ route('orders.edit', $order->id) }}">Edit</a>
										@csrf
										@method('DELETE')
										<button class="btn btn-sm btn-danger" type="submit">Delete</button>
									</form>
									<!-- END BASIC TABLE -->

								<form action="{{ route('orders.print') }}" method="post">
									@csrf
									<input type="hidden" name="order_id" value="{{ $order->id }}">
									<div class="modal fade" id="{{ $order->id }}">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Default Modal</h4>
									      </div>
									      <div class="modal-body">
									        <div class="row">
									        	<div class="col-md-12">

									        		<!-- BASIC TABLE -->
									        		<div class="box">
									        			<div class="box-header with-border">
									        				<h3>Order Details List</h3>
									        			</div>
									        			<div class="box-body">
									        				<table class="table table-bordered">
									        					<thead>
									        						<tr>
									        							<th>Product Id</th>
									        							<th>Quantity</th>
									        							<th>Note</th>
									        							<th>Subtotal</th>
									        							<th>Created At</th>
									        							{{-- <th>Action</th> --}}
									        						</tr>
									        					</thead>
									        					@foreach($order->order_detail as $details)
									        					<tbody>
									        						<tr>
									        							<td>{{ $details->product->name}}</td>
									        							<td>{{ $details->quantity }}</td>
									        							<td>{{ $details->note }}</td>
									        							<td>Rp{{ format_uang($details->subtotal) }}</td>
									        							<td>{{ $details->created_at }}</td>
									        						</tr>
									        					</tbody>
									        					@endforeach
									        				</table>
									        			</div>
									        		</div>
									        		<!-- END BASIC TABLE -->

									        	</div>
									        </div>
									      </div>
									
									      <div class="modal-footer">									      	
									        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
									        <button type="submit" class="btn btn-primary">Print PDF</button>
									      </div>
									    </div>
									    <!-- /.modal-content -->
									  </div>
									  <!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->
								</form>
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
				</div>
			</div>
			



@endsection