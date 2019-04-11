@extends('layouts.app')

@section('title', 'Payments')

@section('content')

	<div class="row">
		<div class="col-md-8">

			<!-- BASIC TABLE -->
			<div class="panel">
				<div class="panel-heading">
					<h3>Payments List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('payments.create') }}">Create</a>
				</div>
				<div class="panel-body">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
						</thead>
						@php
							$no = 1;
						@endphp
						@foreach($data as $payment)
						<tbody>
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $payment->name }}</td>
								<td>{{ $payment->created_at }}</td>
								<td>
									<form method="post" action="{{ route('payments.destroy', $payment->id) }}">
										<a class="btn btn-sm btn-primary" href="{{ route('payments.edit', $payment->id) }}">Edit</a>
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