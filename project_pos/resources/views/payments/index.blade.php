@extends('layouts.app')

@section('title', 'Payments')

@section('datatables')

	<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
	<script type="text/javascript">
		var table;
	    $(function() {
	        var table = $('#payments').DataTable({
	            processing: true,
	            serverSide: true,
	            ajax: "{{ route('json.payment') }}",
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
					<h3>Payments List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('payments.create') }}">Create</a>
				</div>
				<div class="box-body">
					<table class="table table-condensed" id="payments">
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