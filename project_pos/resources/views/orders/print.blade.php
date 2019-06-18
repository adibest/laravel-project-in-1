<body onload="window.print();">

	@php
		$no = 1;

		function format_uang($angka){ 
		    $hasil =  number_format($angka,2, ',' , '.'); 
		    return $hasil; 
		}
	@endphp

	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header">
					<i class="fa fa-globe"></i> AdminLTE, Inc.
					<small class="pull-right">Date: 2/10/2014</small>
				</h2>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->

		<!-- Table row -->
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th>Note</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					@foreach($order_details as $details)
					<tbody>
						<tr>
							<td>{{ $details->product_name}}</td>
							<td>{{ $details->quantity }}</td>
							<td>{{ $details->note }}</td>
							<td>Rp{{ format_uang($details->subtotal) }}</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<div class="row">
			<!-- accepted payments column -->
			<div class="col-xs-6">
				<p class="lead">Payment Methods:</p>
				<img src="../../dist/img/credit/visa.png" alt="Visa">
				<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
				<img src="../../dist/img/credit/american-express.png" alt="American Express">
				<img src="../../dist/img/credit/paypal2.png" alt="Paypal">

				<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
					Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
					dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
				</p>
			</div>
			<!-- /.col -->
			<div class="col-xs-6">
				<p class="lead">Amount Due 2/22/2014</p>

				<div class="table-responsive">
					<table class="table">
						<tbody><tr>
							<th style="width:50%">Subtotal:</th>
							<td>$250.30</td>
						</tr>
						<tr>
							<th>Tax (9.3%)</th>
							<td>$10.34</td>
						</tr>
						<tr>
							<th>Shipping:</th>
							<td>$5.80</td>
						</tr>
						<tr>
							<th>Total:</th>
							<td>$265.24</td>
						</tr>
					</tbody></table>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<!-- this row will not appear when printing -->
		<div class="row no-print">
			<div class="col-xs-12">
				<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
				<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
				</button>
				<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
					<i class="fa fa-download"></i> Generate PDF
				</button>
			</div>
		</div>
	</section>

</body>