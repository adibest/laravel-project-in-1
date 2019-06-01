@extends('layouts.app')

@section('title', 'Filter')

@section('datatables')

	<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script type="text/javascript">
		var table;
	    $(function() {
	        var table = $('#reports').DataTable({
	            processing: true,
	            serverSide: true,
	            ajax: "{{ route('json.order') }}",
	            columns: [
	            	{data: 'id', searchable:false},
		            {data: 'table_number'},
		            {data: 'total'},
		            {data: 'payment_id'},
		            {data: 'user_id'},
		            {data: 'created_at', orderable: false, searchable: false},
		        ],
	        });
	    });
	</script>


@endsection

@section('content')
	@if ($message = Session::get('danger'))
	          <div class="alert alert-danger alert-block">
	            <button type="button" class="close" data-dismiss="alert">×</button> 
	              <strong>{{ $message }}</strong>
	          </div>
	@endif
	<div class="box">
		<div class="box-header">
			<h3>Reports</h3>
			<a class="btn btn-success pull-right" data-toggle="modal" data-target="#filter">Filter</a>
			<a class="btn btn-warning pull-right" data-toggle="modal" data-target="#pdf">PDF</a>
			<a class="btn btn-primary pull-right" data-toggle="modal" data-target="#excel">Excel</a>
			<div class="modal fade" id="filter">
			  <div class="modal-dialog">
			  	{{-- filter nampilkan --}}
			  	@include('filters.show')
			  </div>
			  <!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<div class="modal fade" id="pdf">
			  <div class="modal-dialog">
			  	{{-- filter nampilkan --}}
			  	@include('filters.pdf')
			  </div>
			  <!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<div class="modal fade" id="excel">
			  <div class="modal-dialog">
			  	{{-- filter nampilkan --}}
			  	@include('filters.excel')
			  </div>
			  <!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
		<div class="box-body">
			<div class="col-xs-12 table-responsive">
				<table class="table table-bordered" id="reports">
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
						{{-- @php
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
						@endforeach --}}
					</tbody>
				</table>
			</div>			
		</div>
	</div>



@endsection