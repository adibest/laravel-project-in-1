@extends('layouts.app')

@section('title', 'Filter')

@section('content')

	<div class="box">
		<div class="box-header">
			<h3>Reports</h3>
			<a class="btn btn-success pull-right" data-toggle="modal" data-target="#filter">Filter</a>
			<a class="btn btn-warning pull-right" data-toggle="modal" data-target="#pdf">PDF</a>
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
			<a href="{{ route('filters.export') }}" class="btn btn-sm btn-danger" target="_blank">Export Excel</a>			
		</div>
	</div>



@endsection