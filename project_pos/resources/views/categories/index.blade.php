@extends('layouts.app')

@section('title', 'Categories')

@section('datatables')

	<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script type="text/javascript">
		var table;
	    $(function() {
	        var table = $('#categories').DataTable({
	            processing: true,
	            serverSide: true,
	            ajax: "{{ route('json.category') }}",
	            columns: [
	            	{data: 'id', searchable:false},
		            {data: 'name'},
		            {data: 'created_at', orderable: false, searchable: false},
		            {data: 'action', name:'action', orderable: false, searchable: false},
		        ],
	        });
	    });
	</script>


@endsection

@section('content')


			<!-- BASIC TABLE -->
			<div class="box">
				<div class="box-header with-border">
					<h3>Categories List</h3>
					<span><a class="btn btn-primary pull-right" href="{{ route('categories.create') }}">Create</a></span>
				</div>
				<div class="box-body">
					<table class="table table-bordered" id="categories">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<!-- END BASIC TABLE -->



@endsection