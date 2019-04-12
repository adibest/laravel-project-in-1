@extends('layouts.app')

@section('title', 'Edit Categories')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel">
				<div class="panel-heading">
					<h3>Edit Category</h3>
				</div>
				<form method="post" action="{{ route('categories.update', $data->id) }}">

					@csrf
					@method('PUT')
					<div class="panel-body">
						<label>Nama</label>
						<input type="text" name="name" class="form-control" value="{{ $data->name }}">
					</div>
					<div class="panel-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection