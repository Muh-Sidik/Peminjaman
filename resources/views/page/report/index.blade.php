@extends('admin_lte.layouts')

@section('basic')

@if(!isset($_GET['type']))
	<div class="jumbotron">
		<div class="row">
			<div class="col-md-8"><b>Booking Date</b></div>	
			<div class="col-md-4"><b>Order Status</b></div>
		</div>
		<hr>
		<form action="" method="get">
			<div class="row">
				<div class="col-md-4">
					<input type="text" class="form-control" name="start_date" placeholder="Start Date" id="datepicker">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" name="end_date" placeholder="End Date" id="datepickers">
				</div>
				<div class="col-md-4">
					<select name="type" class="form-control">
						<option value="all">All</option>
						<option value="process">Process</option>
						<option value="paid">Paid</option>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-secondary btn-block">SEARCH</button>
				</div>
			</div>
		</form>
	</div>
@else
	@include('page.report.transaction')
@endif
    
@endsection