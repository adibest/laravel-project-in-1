@extends('layouts.app')

@section('title', 'Orders')

@section('content')


			<!-- BASIC TABLE -->
			<div class="box">
				<div class="box-header with-border">
					<h3>Orders List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('orders.create') }}">Create</a>
					<a class="btn btn-success pull-right" data-toggle="modal" data-target="#filter">Filter</a>

						<div class="modal fade" id="filter">
						  <div class="modal-dialog">
						  	<form method="post" action="">	
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
							        				<h3>Filter</h3>
							        			</div>
							        			<div class="box-body">
							        				<div class="form-group">
		        					                  	<label class="col-sm-3 control-label">Tahun</label>
		        					                  	<div class="col-sm-7">
		        						                    <select class="form-control select2" name="year" required>
		        						                    	@foreach(range(2018, date('Y')) as $row)
		        							                    	<option value="{{$row}}" {{($row==date('Y')) ? 'selected': ''}}>{{ $row }}</option>
		        						                    	@endforeach
		        						                    </select>
		        					                  	</div>
		        					                </div>
		        					                <div class="form-group">
		        					                	<label class="col-sm-3 control-label">Bulan</label>
		        					                	<div class="col-sm-7">
		        					                		<select class="select2 form-control" name="month" required>
		        					                			@for($i=1; $i <= 12; $i++)
		        					                			<option value="{{$i}}" {{($i==date('n')) ? 'selected': ''}}>{{ date('F', strtotime(date('Y').'-'.$i.'-01')) }}</option>
		        					                			@endfor
		        					                		</select>
		        					                	</div>
		        					                </div>
		        					                <div class="form-group">
		        					                  	<label class="col-sm-3 control-label">Cashier</label>
		        					                  	<div class="col-sm-7">
		        						                    <select class="form-control select2" name="user_id" required>
		        						                    	@foreach($users as $cashier)
		        							                    	<option value="{{$cashier->id}}">{{ $cashier->name }}</option>
		        						                    	@endforeach
		        						                    </select>
		        					                  	</div>
		        					                </div>
							        			</div>
							        		</div>
							        		<!-- END BASIC TABLE -->

							        	</div>
							        </div>
							      </div>
							
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							        <button class="btn btn-primary">Submit</button>
							      </div>
							    </div>
							    <!-- /.modal-content -->
						  	</form>
						  </div>
						  <!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->
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
									        <button type="button" class="btn btn-primary">Save changes</button>
									      </div>
									    </div>
									    <!-- /.modal-content -->
									  </div>
									  <!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
				</div>
			</div>
			



@endsection