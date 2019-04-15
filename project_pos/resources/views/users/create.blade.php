@extends('layouts.app')

@section('title', 'Create Users')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-heading">
					<h3>Create User</h3>
				</div>
				<form method="post" action="{{ route('users.store') }}">

					@csrf

					<div class="box-body">
						<label>Nama</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="box-body">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="box-body">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="box-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
