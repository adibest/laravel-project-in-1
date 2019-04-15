@extends('layouts.app')

@section('title', 'Create Order Details')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-header">
					<h3>Create Order Detail</h3>
				</div>
				<form method="post" action="{{ route('order_details.store') }}">

					@csrf

					<div class="box-body">
						<label>Order</label>
						<select class="form-control" name="order_id">
							@foreach($order as $item)
							<option value="{{ $item->id }}">{{ $item->id }}</option>
							@endforeach
						</select>
					</div>
					<div class="box-body">
						<label>Item Name</label>
						<select class="form-control" name="product_id">
							@foreach($product as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="box-body">
						<label>Item ID</label>
						<select class="form-control" name="product_name">
							@foreach($product as $item)
							<option value="{{ $item->name }}">{{ $item->id }} = {{ $item->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="box-body">
						<label>Item Price</label>
						<select class="form-control" name="product_price">
							@foreach($product as $item)
							<option value="{{ $item->price }}">{{ $item->name }} = {{ $item->price }}</option>
							@endforeach
						</select>
					</div>
					<div class="box-body">
						<label>Quantity</label>
						<input type="text" name="quantity" class="form-control">
					</div>
					<div class="box-body">
						<label>Note</label>
						<input type="text" name="note" class="form-control">
					</div>
					<div class="box-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
