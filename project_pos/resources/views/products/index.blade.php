@extends('layouts.app')

@section('title', 'Items')

@section('content')

	<div class="row">
		<div class="col-md-8">

			<!-- BASIC TABLE -->
			<div class="panel">
				<div class="panel-heading">
					<h3>Items List</h3>
					<a class="btn btn-primary pull-right" href="{{ route('products.create') }}">Create</a>
				</div>
				<div class="panel-body">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Category</th>
								<th>Name</th>
								<th>Price</th>
								<th>Status</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
						</thead>
						@php
							$no = 1;
						@endphp
						@foreach($data as $product)
						<tbody>
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $product->category->name }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ $product->price }}</td>
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
						@endforeach
					</table>
				</div>
			</div>
			<!-- END BASIC TABLE -->

		</div>
	</div>


@endsection