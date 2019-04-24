<!DOCTYPE html>
<html>
<head>
	<title>Edit Order</title>
</head>
<body>

	<div id="app">

		<h2>Edit Order</h2>

		<form method="post" action="{{ route('orders.update', $order->id) }}">
			@csrf @method('PUT')
			<hr>
			<h4>Order</h4>

			<p>
				Table Number:
				<input type="number" name="table_number" value="{{ $order->table_number }}">
			</p>
			<p>
				Payment:
				<select name="payment_id">
					@foreach($payments as $payment)
					<option 
						value="{{ $payment->id }}"
						{{ $order->payment_id == $payment->id ? 'selected' : '' }}
					>
						{{ $payment->name }}
					</option>
					@endforeach
				</select>
			</p>

			<hr>
			<h4>Order Detail</h4>

			<p
				v-for="(order, index) in orders"
				:key="index"
			>
				@{{ index + 1 }}.

				<select name="product_id[]" v-model="order.product_id">
					@foreach($products as $product)
					<option value="{{ $product->id }}">{{ $product->name }}</option>
					@endforeach
				</select>

				<input type="number" name="quantity[]" v-model="order.quantity">pcs :

				Rp<input 
					type="number" 
					name="subtotal[]" 
					:value="subtotal(order.product_id, order.quantity, index)"
					readonly 
				>

				<button type="button" @click="delDetail(index)">delete</button>
			</p>

			<button type="button" @click="addDetail()">add</button>

			<br>

			<h3>Total : Rp <input type="number" name="total" :value="total" readonly></h3>

			<br>

			<button><b>Submit</b></button>
		</form>

	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
	<script type="text/javascript">
		new Vue({
			el: '#app',

			data: {
				orders: [
					{product_id: 0, quantity: 1, subtotal: 0},
				]
			},

			methods: {
				addDetail() {
					var orders = {product_id: 0, quantity: 1, subtotal: 0};

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
					var products = [];

					products[0] = 0;

					@foreach($products as $product)
						products[ {{ $product->id }} ] = {{ $product->price }}
					@endforeach

					return products;
				},
				total() {
					return this.orders
					.map( order => order.subtotal )
					.reduce( (prev, next) => prev + next );
				},
			},

			created() {
				var orders = [];

				@foreach($order->orderDetail as $index => $detail)

					orders[ {{$index}} ] = {
						product_id: {{ $detail->product_id }},
						quantity: {{ $detail->quantity }},
						subtotal: {{ $detail->subtotal }},
					};

				@endforeach

				this.orders = orders;
			},
		});
	</script>

</body>
</html>