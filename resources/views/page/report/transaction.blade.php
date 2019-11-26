@extends('admin_lte.layouts')

@section('basic')

<section class="content">
	<div class="card card-secondary card-outline">
		<div class="card-header">
			Order Transaction period {{ $data['start_date'] }} until {{ $data['end_date'] }} and status ' {{ $data['type'] }} '
		</div>
		<div class="card-body">
			<table class="table table-sm" id="myTable">
				<thead>
					<tr>
						<th>Booking Code</th>
						<th>Order Date</th>
						<th>Clients Name</th>
						<th>Car Name</th>
						<th>Order Duration</th>
						<th>Return Date Supposed</th>
						<th>Return Date</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Order Fine</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bookings as $row)
					<tr>

						<td>{{ $row['booking_code'] }}</td>
						<td>{{ $row['order_date'] }}</td>
						<td>{{ $row['name'] }}</td>
						<td>{{ $row['car_name'] }}</td>
						<td>{{ $row['duration'] }}</td>
						<td>{{ $row['return_date_supposed'] }}</td>
						<td>{{ $row['return_date'] }}</td>
						<td>{{ $row['price'] }}</td>
						<td>{{ $row['status'] }}</td>
						<td>{{ $row['fine'] }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

@endsection