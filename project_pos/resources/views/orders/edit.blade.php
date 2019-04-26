@extends('layouts.app')

@section('title', 'Create Orders')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3>Create Order</h3>
				</div>
				<form method="post" action="{{ route('orders.update', $order->id) }}">

					@csrf @method('PUT')
					<div class="col">
						<div class="box-body col col-sm-6">
							<label>Table Number</label>
							<input type="text" name="table_number" class="form-control" value="{{ $order->table_number }}">
						</div>
						<div class="box-body col col-sm-6">
							<label>Payment</label>
							<select class="form-control" name="payment_id">
								@foreach($payment as $item)
								<option 
									value="{{ $item->id }}" 
									{{ $order->payment_id == $item->id ? 'selected' : '' }}
								>
									{{ $item->name }}
								</option>
								@endforeach
							</select>
						</div>
					</div>

					{{-- for vue form dynamic --}}
					<div id="app">

						<div class="col" v-for="(invoice_product, k) in invoice_products" :key="k">
							
							<div class="box-body col col-sm-1">
								<label>Delete</label>
								<button class="btn btn-danger" @click="deleteRow(k, invoice_product)">
									<i class="fa fa-trash"></i>
									Del
								</button>
							</div>
							<div class="box-body col col-sm-4">
								<label>Item Name</label>
								<select class="form-control" name="product_id[]" v-model="invoice_product.product_id">
									@foreach($product as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="box-body col col-sm-2">
								<label>Quantity</label>
								<input type="text" name="quantity[]" class="form-control" v-model="invoice_product.quantity">
							</div>
							<div class="box-body col col-sm-5">
								<label>Note</label>
								<input type="text" name="note[]" class="form-control" v-model="invoice_product.note">
							</div>
						</div>

						<div class="box-body col col-sm-12">
							<button type="button" class="btn btn-info" @click="addNewRow">
							    <i class="fa fa-plus-circle"></i>
							    Add
							</button>
						</div>
					
					</div>



					<div class="box-body">
						<button class="btn btn-default" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
