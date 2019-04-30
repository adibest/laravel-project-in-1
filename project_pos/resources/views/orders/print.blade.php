<div class="row">
	<div class="col-md-12">

		<!-- BASIC TABLE -->
		<div class="box">
			<div class="box-header with-border">
				<h3>Order Details List</h3>
			</div>
			<div class="box-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Product Id</th>
							<th>Quantity</th>
							<th>Note</th>
							<th>Subtotal</th>
							<th>Cashier</th>
							<th>Created At</th>
							{{-- <th>Action</th> --}}
						</tr>
					</thead>
					@php
						$no = 1;

						function format_uang($angka){ 
						    $hasil =  number_format($angka,2, ',' , '.'); 
						    return $hasil; 
						}
					@endphp
					@foreach($order_details as $details)
					<tbody>
						<tr>
							<td>{{ $details->product->name}}</td>
							<td>{{ $details->quantity }}</td>
							<td>{{ $details->note }}</td>
							<td>Rp{{ format_uang($details->subtotal) }}</td>
							<td>{{ $details->user_id }}</td>
							<td>{{ $details->created_at }}</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
		<!-- END BASIC TABLE -->

	</div>
</div>