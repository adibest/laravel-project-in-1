@extends('layouts.app')

@section('title', 'Create Categories')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-header">
					<h3>Create Category</h3>
				</div>
				<form method="post" action="{{ route('categories.store') }}">

					@csrf

					<div class="box-body">
						<label>Nama</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}">
						@if($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="box-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
