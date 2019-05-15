@extends('layouts.app')

@section('title', 'Items')

@section('datatables')

	<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script type="text/javascript">
		var table;
	    $(function() {
	        var table = $('#items').DataTable({
	            processing: true,
	            serverSide: true,
	            ajax: "{{ route('json.product') }}",
	            columns: [
		            {data: 'category_id'},
		            {data: 'name'},
		            {data: 'price'},
		            {data: 'status', orderable: false},
		            {data: 'created_at', orderable: false, searchable: false},
		        ],
	        });
	    });
	</script>


@endsection

@section('content')


			<!-- BASIC TABLE -->
			<div class="box">
				<div class="box-header with-border">
					<h3>Items List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('products.create') }}">Create</a>
				</div>
				<div class="box-body">
					<table class="table table-bordered" id="items">
						<thead>
							<tr>
								{{-- <th>#</th> --}}
								<th>Category</th>
								<th>Name</th>
								<th>Price</th>
								<th>Status</th>
								<th>Created At</th>
								{{-- <th>Action</th> --}}
							</tr>
						</thead>
						{{-- @php
							$no = 1;

							function format_uang($angka){ 
							    $hasil =  number_format($angka,2, ',' , '.'); 
							    return $hasil; 
							}
						@endphp
						@foreach($data as $product)
						<tbody>
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $product->category->name }}</td>
								<td>{{ $product->name }}</td>
								<td>Rp{{ format_uang($product->price) }}</td>
								<td>{{ $product->status?'Ada':'Habis' }}</td>
								<td>{{ $product->created_at }}</td>
								<td>
									<form method="post" action="{{ route('products.destroy', $product->id) }}">
										<a class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
										@csrf
										@method('DELETE')
										<button class="btn btn-sm btn-danger" type="submit">Delete</button>
									</form>
								</td>
							</tr>
						</tbody>
						@endforeach --}}
					</table>
				</div>
			</div>
			<!-- END BASIC TABLE -->




@endsection

