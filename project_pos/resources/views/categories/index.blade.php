@extends('layouts.app')

@section('title', 'Categories')

@section('content')


			<!-- BASIC TABLE -->
			<div class="box">
				<div class="box-header with-border">
					<h3>Categories List</h3>
					<span><a class="btn btn-primary pull-right" href="{{ route('categories.create') }}">Create</a></span>
				</div>
				<div class="box-body">
					<table class="table table-bordered">
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
						@foreach($data as $category)
						<tbody>
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->created_at }}</td>
								<td>
									<form method="post" action="{{ route('categories.destroy', $category->id) }}">
										<a class="btn btn-sm btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
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



@endsection