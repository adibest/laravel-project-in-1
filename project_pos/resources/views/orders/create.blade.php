@extends('layouts.app')

@section('title', 'Create Orders')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<h3>Create Order</h3>
				</div>
				<form method="post" action="{{ route('orders.store') }}">

					@csrf

					<div class="panel-body">
						<label>Table Number</label>
						<input type="text" name="table_number" class="form-control">
					</div>
					<div class="panel-body">
						<label>Total</label>
						<input type="text" name="total" class="form-control">
					</div>
					<div class="panel-body">
						<label>Payment</label>
						<select class="form-control" name="payment_id">
							@foreach($payment as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>User</label>
						<select class="form-control" name="user_id">
							@foreach($user as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>Order</label>
						<select class="form-control" name="order_id">
							@foreach($order as $item)
							<option value="{{ $item->id }}">{{ $item->id }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>Item Name</label>
						<select class="form-control" name="product_id">
							@foreach($product as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>Item ID</label>
						<select class="form-control" name="product_name">
							@foreach($product as $item)
							<option value="{{ $item->name }}">{{ $item->id }} = {{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>Item Price</label>
						<select class="form-control" name="product_price">
							@foreach($product as $item)
							<option value="{{ $item->price }}">{{ $item->name }} = {{ $item->price }}</option>
							@endforeach
						</select>
					</div>
					<div class="panel-body">
						<label>Quantity</label>
						<input type="text" name="quantity" class="form-control">
					</div>
					<div class="panel-body">
						<label>Note</label>
						<input type="text" name="note" class="form-control">
					</div>
					<div class="panel-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
