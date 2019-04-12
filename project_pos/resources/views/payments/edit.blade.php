@extends('layouts.app')

@section('title', 'Edit Payments')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel">
				<div class="panel-heading">
					<h3>Edit Payment</h3>
				</div>
				<form method="post" action="{{ route('payments.update', $data->id) }}">

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