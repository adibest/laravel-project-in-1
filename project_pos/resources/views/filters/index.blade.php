@extends('layouts.app')

@section('title', 'Filter')

@section('content')

	<div class="box">
		<div class="box-header">
			<h3>Reports</h3>
			<a class="btn btn-success pull-right" data-toggle="modal" data-target="#filter">Filter</a>
			<div class="modal fade" id="filter">
			  <div class="modal-dialog">
			  	<form method="post" action="{{ route('filters.show') }}">
			  		@csrf
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
			<form action="{{ route('filters.print') }}" method="post">	
				@csrf
				<button>Print PDF</button>
				<a href="{{ route('filters.export') }}" class="btn btn-sm btn-danger" target="_blank">Export Excel</a>
			</form>
		</div>
		<div class="box-body">
				<div class="col-xs-12 table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Table Number</th>
								<th>Total</th>
								<th>Payment</th>
								<th>Cashier</th>
								<th>Created At</th>
							</tr>
						</thead>
						<tbody>
							@php
							$no = 1;

							function format_uang($angka){ 
								$hasil =  number_format($angka,2, ',' , '.'); 
								return $hasil; 
							}
							@endphp
							@foreach($orders as $order)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $order->table_number }}</td>
								<td>Rp{{ format_uang($order->total) }}</td>
								<td>{{ $order->payment->name }}</td>
								<td>{{ $order->user->name }}</td>
								<td>{{ $order->created_at }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			
		</div>
	</div>



@endsection