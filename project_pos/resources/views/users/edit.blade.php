@extends('layouts.app')

@section('title', 'Edit Users')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-header">
					<h3>Edit User</h3>
				</div>
				<form method="post" action="{{ route('users.update', $data->id) }}">

					@csrf
					@method('PUT')
					<div class="box-body">
						<label>Nama</label>
						<input type="text" name="name" class="form-control" value="{{ $data->name }}">
					</div>
					<div class="box-body">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="{{ $data->email }}">
					</div>
					<div class="box-body">
						<label>Password</label>
						<input type="password" name="password" class="form-control" value="{{ $data->password }}">
					</div>
					<div class="box-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection