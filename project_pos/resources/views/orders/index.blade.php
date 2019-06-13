@extends('layouts.app')

@section('title', 'Orders')

@section('content')

			@if ($message = Session::get('success'))
			          <div class="alert alert-success alert-block">
			            <button type="button" class="close" data-dismiss="alert">×</button> 
			              <strong>{{ $message }}</strong>
			          </div>
			@endif
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

									<input type="hidden" name="order_id" value="{{ $order->id }}">
									<div class="modal fade" id="{{ $order->id }}">
									  <div class="modal-dialog">
									    <div class="modal-content" style="min-width: 800px;">
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
									        							<td>{{ $details->product_name}}</td>
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

									        		<section class="invoice">
									        		      <!-- title row -->
									        		      <div class="row">
									        		        <div class="col-xs-12">
									        		          <h2 class="page-header">
									        		            <i class="fa fa-globe"></i> AdminLTE, Inc.
									        		            <small class="pull-right">Date: 2/10/2014</small>
									        		          </h2>
									        		        </div>
									        		        <!-- /.col -->
									        		      </div>
									        		      <!-- info row -->

									        		      <!-- Table row -->
									        		      <div class="row">
									        		        <div class="col-xs-12 table-responsive">
									        		          <table class="table table-striped">
									        		            <thead>
									        		            <tr>
									        		              <th>Product</th>
									        		              <th>Quantity</th>
									        		              <th>Note</th>
									        		              <th>Subtotal</th>
									        		            </tr>
									        		            </thead>
									        		            @foreach($order->order_detail as $details)
									        		            <tbody>
									        		            	<tr>
									        		            		<td>{{ $details->product_name}}</td>
									        		            		<td>{{ $details->quantity }}</td>
									        		            		<td>{{ $details->note }}</td>
									        		            		<td>Rp{{ format_uang($details->subtotal) }}</td>
									        		            	</tr>
									        		            </tbody>
									        		            @endforeach
									        		          </table>
									        		        </div>
									        		        <!-- /.col -->
									        		      </div>
									        		      <!-- /.row -->

									        		      <div class="row">
									        		        <!-- accepted payments column -->
									        		        <div class="col-xs-6">
									        		          <p class="lead">Payment Methods:</p>
									        		          <img src="../../dist/img/credit/visa.png" alt="Visa">
									        		          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
									        		          <img src="../../dist/img/credit/american-express.png" alt="American Express">
									        		          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

									        		          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
									        		            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
									        		            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
									        		          </p>
									        		        </div>
									        		        <!-- /.col -->
									        		        <div class="col-xs-6">
									        		          <p class="lead">Amount Due 2/22/2014</p>

									        		          <div class="table-responsive">
									        		            <table class="table">
									        		              <tbody><tr>
									        		                <th style="width:50%">Subtotal:</th>
									        		                <td>$250.30</td>
									        		              </tr>
									        		              <tr>
									        		                <th>Tax (9.3%)</th>
									        		                <td>$10.34</td>
									        		              </tr>
									        		              <tr>
									        		                <th>Shipping:</th>
									        		                <td>$5.80</td>
									        		              </tr>
									        		              <tr>
									        		                <th>Total:</th>
									        		                <td>$265.24</td>
									        		              </tr>
									        		            </tbody></table>
									        		          </div>
									        		        </div>
									        		        <!-- /.col -->
									        		      </div>
									        		      <!-- /.row -->

									        		      <!-- this row will not appear when printing -->
									        		      <div class="row no-print">
									        		        <div class="col-xs-12">
									        		          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
									        		          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
									        		          </button>
									        		          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
									        		            <i class="fa fa-download"></i> Generate PDF
									        		          </button>
									        		        </div>
									        		      </div>
									        		    </section>

									        	</div>
									        </div>
									      </div>
									
									      <div class="modal-footer">									      	
											<form action="{{ route('orders.print') }}" method="post">
												@csrf
										        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
										        <a class="btn btn-success" href="{{ route('mails.index') }}">Send to mail</a>
										        <button type="submit" class="btn btn-primary">Print PDF</button>
											</form>
											<form method="post" action="{{ route('mails.send') }}">
												@csrf
												<input type="text" name="receiver">
												<button type="submit">Send</button>
											</form>
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