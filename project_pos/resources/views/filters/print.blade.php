  <div class="col-xs-12 table-responsive">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>No</th>
          <th>Table Number</th>
          <th>Total</th>
          <th>Payment</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1;

        function format_uang($angka){ 
          $hasil =  number_format($angka,2, ',' , '.'); 
          return $hasil; 
        }
        @endphp
        @foreach($orders as $order)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $order->table_number }}</td>
          <td>Rp{{ format_uang($order->total) }}</td>
          <td>{{ $order->payment->name }}</td>
          <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>