<!DOCTYPE html>
<html>
<head>
	<title>Create Order</title>
</head>
<body>

	<div id="app">

		<h2>CReate Order</h2>

		<form>
			<hr>
			<h4>Order</h4>

			<p>
				Table Number:
				<input type="number" name="table_number">
			</p>
			<p>
				Payment:
				<select name="payment_id">
					@foreach($payments as $payment)
					<option value="{{ $payment->id }}">{{ $payment->name }}</option>
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

				<select name="product_id" v-model="order.product_id">
					@foreach($products as $product)
					<option value="{{ $product->id }}">{{ $product->name }}</option>
					@endforeach
				</select>

				<input type="number" name="quantity" v-model="order.quantity">pcs :

				Rp<input 
					type="number" 
					name="subtotal" 
					:value="subtotal(order.product_id, order.quantity, index)"
					readonly 
				>

				<button type="button">delete</button>
			</p>

			<button type="button" @click="addDetail()">add</button>

			<br>

			<h3>Total : Rp <input type="number" name="total" :value="total" readonly></h3>

			<br>

			<button><b>Submit</b></button>
		</form>

		@{{ products }}

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
		});
	</script>

</body>
</html>