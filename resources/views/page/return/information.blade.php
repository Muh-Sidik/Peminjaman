@extends('admin_lte.layouts')

@section('basic')

<div class="content col-md-12">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h3 class="card-title">Rent Information</h3>
            </div>
           <form action="{{ route('pengembalian.process') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td><b>Nama Pelanggan</b> </td>
                                <td>: </td>
                                <td>{{ $client->client_name }}</td>
                                <input type="hidden" name="client_id" value="{{$client->client_id}}" required>
                            </tr>
                        </thead>
                        <tr>
                            <th>Car Name </th>
                            <td>: </td>
                            <td>{{ $tem->item_name }}</td>
                            <input type="hidden" name="item_id" value="{{ $item->item_id }}" required>
                        </tr>
                        <tr>
                            <th>Kode Booking</th>
                            <td>: </td>
                            <td>{{ $data['booking_code'] }}</td>
                            <input type="hidden" name="booking_code" value="{{$data['booking_code']}}" required>
                        </tr>
                        <tr>
                            <th>Waktu Penyewaan</th>
                            <td> : </td>
                            <td>{{ $data['order_date'] }}</td>
                            <input type="hidden" name="order_date" value="{{$data['order_date']}}" required>
                        </tr>
                        <tr>
                            <th>Durasi Penyewaan</th>
                            <td> : </td>
                            <td>{{ $data['duration'] }} Days</td>
                            <input type="hidden" name="duration" value="{{ $data['duration'] }}" required>
                        </tr>
                        <tr>
                            <th>Waktu Pengembalian</th>
                            <td> : </td>
                            <td>{{ $data['return_date_supposed'] }}</td>
                            <input type="hidden" name="return_date_supposed" value="{{ $data['return_date_supposed'] }}" required>
                        </tr>
                        <tr>
                            <th>Harga Perhari</th>
                            <td> : </td>
                            <td>Rp. {{ number_format($item->price) }}</td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td> : </td>
                            <td>Rp. {{ number_format($data['price']) }}</td>
                            <input type="hidden" name="price" value="{{ $data['price'] }}" required>
                        </tr>
                        <tr>
                            <th>Fine</th>
                            <td> : </td>
                            @if($fine != null)
                            <td style="color:red">Rp. {{ number_format($fine) }} (Late {{$late}} Days)</td>
                            @else 
                            <td>0</td>
                            @endif
                            <input type="hidden" name="fine" value="{{ $fine }}" required>
                        </tr>
                        <tr>
                            <th>DP</th>
                            <td> : </td>
                            <td>Rp. {{ number_format($payment->amount) }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">TOTAL</th>
                            <input type="hidden" name="total" id="total" value="{{ $total }}" >
                            <td>Rp. {{ number_format($total) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><button href="#" data-toggle="modal" data-target="#paymentModal" type="button"> Process </button></td>
                        </tr>
                    </table>
                </div>
                <!-- payment MODALS  -->
                @include('page.return.form-payment')
            </form>
        </div>	
    </div>
    
@endsection

@push('scripts')
<script>
	$(document).ready(function(e){
        $('#amount').keyup(function(){
            var amount = $(this).val();
            var total = $('#total').val();
            if(amount != ''){
                $.ajax({
                    success:function(data){
                        $('#change').html(amount - total);
                    }
                });
            }
        });
    });
</script>
@endpush