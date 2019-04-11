@extends('layouts.app')

@section('title', 'Create Payments')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel">
				<div class="panel-heading">
					<h3>Create Payment</h3>
				</div>
				<form method="post" action="{{ route('payments.store') }}">

					@csrf

					<div class="panel-body">
						<label>Nama</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="panel-body">
						<button type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
