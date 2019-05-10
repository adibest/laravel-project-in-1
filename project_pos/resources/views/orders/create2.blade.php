@extends('layouts.app')

@section('title', 'Create Orders')

@section('content')

	<div class="row" id="app">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header">
					<h3>Create Orders</h3>
				</div>
				<div class="box-body">
					<form method="post" action="{{ route('orders.store') }}">
						@csrf

						<div class="col">
							<div class="box-body col col-sm-6">
								<label>Table Number</label>
								<input type="text" name="table_number" class="form-control">
							</div>
							<div class="box-body col col-sm-6">
								<label>Payment</label>
								<select class="form-control" name="payment_id">
									@foreach($payment as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div 
							class="col"
							v-for="(order, index) in orders"
							:key="index"
						>

							<div class="box-body col col-sm-3">
								<label>Product</label>
								<select name="product_id[]" class="form-control" v-model="order.product_id">
									@foreach($product as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
								<input type="hidden" name="product_name[]" 
									:value="product_name(order.product_id, index)"
								>
								<input type="hidden" name="product_price[]"
									:value="product_price(order.product_id, index)"
								>
							<div class="box-body col col-sm-1">
								<label>Quantity</label>
								<input type="number" name="quantity[]" class="form-control" v-model="order.quantity">
							</div>
							<div class="box-body col col-sm-1">
								<label>Discount(%)</label>
								<input type="number" name="discount[]" class="form-control" v-model="order.discount">
							</div>
							<div class="box-body col col-sm-3">
								<label>Subtotal</label>
								<input type="number" name="subtotal[]" class="form-control"
									:value="subtotal(order.product_id, order.discount, order.quantity, index)"
									readonly 
								>
							</div>
							<div class="box-body col col-sm-3">
								<label>Note</label>
								<input type="text" name="note[]" class="form-control" v-model="order.note">
							</div>
							<div class="box-body col col-sm-1">
								<label>Delete</label>
								<button class="btn btn-danger form-control" type="button" @click="delDetail(index)">
									<i class="fa fa-trash"></i>
									Del
								</button>
							</div>
						</div>

					<button type="button" class="btn btn-primary" @click="addDetail()">
						<i class="fa fa-plus-circle"></i>
						Add
					</button>

					<h3>Total : Rp <input type="number" name="total" :value="total" readonly></h3>

					<button class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>	
	</div>

@endsection

@section('vue')
	<script type="text/javascript">
		new Vue({
			el: '#app',
			data: {
				orders: [
					{product_id: 0, product_name:"", product_price: 0, quantity: 1, discount: 0, subtotal: 0, note:""},
				]
			},
			methods: {
				addDetail() {
					var orders = {product_id: 0, product_name:"", product_price: 0, quantity: 1, discount: 0, subtotal: 0, note:""};
					this.orders.push(orders);
				},
				delDetail(index) {
					if (index > 0) {
						this.orders.splice(index, 1);
					}
				},
				subtotal(product_id, discount, quantity, index) {
					var subtotal = (this.products[product_id] - this.products[product_id]*discount/100) * quantity;
					this.orders[index].subtotal = subtotal;
					return subtotal;
				},
				product_price(product_id, index) {
					var product_price = this.products[product_id];
					this.orders[index].product_price = product_price;
					return product_price;
				},
				product_name(product_id, index) {
					var product_name = this.names[product_id];
					this.orders[index].product_name = product_name;
					return product_name;
				}
			},
			computed: {
				products() {
					var product = [];
					product[0] = 0;
					@foreach($product as $item)
						product[ {{ $item->id }} ] = {{ $item->price }}
					@endforeach
					return product;
				},
				names() {
					var product = [];
					product[0] = 0;
					@foreach($product as $item)
						product[ {{ $item->id }} ] = "{{ $item->name }}"
					@endforeach
					return product;
				},
				total() {
					return this.orders
					.map( order => order.subtotal )
					.reduce( (prev, next) => prev + next );
				},
			},
		});
	</script>
@endsection