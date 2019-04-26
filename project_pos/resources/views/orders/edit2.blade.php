@extends('layouts.app')

@section('title', 'Edit Orders')

@section('content')

	<div class="row" id="app">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header">
					<h3>Edit Orders</h3>
				</div>
				<div class="box-body">
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
						<div 
							class="col"
							v-for="(order, index) in orders"
							:key="index"
						>
							
							<div class="box-body col col-sm-1">
								<label>Nomor</label>
								<div>@{{ index + 1 }}</div>
							</div>
							<div class="box-body col col-sm-3">
								<label>Product</label>
								<select name="product_id[]" class="form-control" v-model="order.product_id">
									@foreach($product as $item)
									<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="box-body col col-sm-1">
								<label>Quantity</label>
								<input type="number" name="quantity[]" class="form-control" v-model="order.quantity">
							</div>
							<div class="box-body col col-sm-3">
								<label>Subtotal</label>
								<input type="number" name="subtotal[]" class="form-control"
									:value="subtotal(order.product_id, order.quantity, index)"
									readonly 
								>
							</div>
							<div class="box-body col col-sm-3">
								<label>Note</label>
								<input type="text" name="note[]" class="form-control" :value="order.note">
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
					{product_id: 0, quantity: 1, subtotal: 0, note:""},
				]
			},
			methods: {
				addDetail() {
					var orders = {product_id: 0, quantity: 1, subtotal: 0, note:""};
					this.orders.push(orders);
				},
				delDetail(index) {
					if (index > 0) {
						this.orders.splice(index, 1);
					}
				},
				subtotal(product_id, quantity, index) {
					var subtotal = this.products[product_id] * quantity;
					this.orders[index].subtotal = subtotal;
					return subtotal;
				},
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
				total() {
					return this.orders
					.map( order => order.subtotal )
					.reduce( (prev, next) => prev + next );
				},
			},
			created() {
				var orders = [];
				@foreach($order->order_detail as $index => $detail)
					orders[ {{$index}} ] = {
						product_id: {{ $detail->product_id }},
						quantity: {{ $detail->quantity }},
						subtotal: {{ $detail->subtotal }},
						note: {{ $detail->note }},
					};
				@endforeach
				this.orders = orders;
			},
		});
	</script>
@endsection