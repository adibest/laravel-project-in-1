@extends('layouts.app')

@section('title', 'Users')

@section('content')

	<div class="row">
		<div class="col-md-8">

			<!-- BASIC TABLE -->
			<div class="panel">
				<div class="panel-heading">
					<h3>Users List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('users.create') }}">Create</a>
				</div>
				<div class="panel-body">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
						</thead>
						@php
							$no = 1;
						@endphp
						@foreach($data as $user)
						<tbody>
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at }}</td>
								<td>
									<form method="post" action="{{ route('users.destroy', $user->id) }}">
										<a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
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