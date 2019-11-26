@extends('admin_lte.layouts')

@section('basic')

<section class="content col-md-6">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif

<!-- Modal -->
@include('page.booking.form-client')

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Form {{$title}} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('booking.calculate') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Kode Booking</p>
                            <input type="text" class="form-control" required name="booking_code" value=" B-{{ rand() }}" readonly>
                        </div>
                        <div class="form-group">
                            <p>Nama Pelanggan atau ID Pelanggan</p>
                            <input type="text" class="form-control" required id="client" value="{{ old('client_id') }}" placeholder="type something">
                            <input type="hidden" name="client_id" id="client_id" value="{{ old('client_id') }}">
                            <div id="client-list"></div>
                        </div>
                        <div class="form-group">
                            <p>Waktu Pesanan</p>
                            <input type="text" class="form-control" required name="order_date" value="{{ old('order_date') }}" id="datepickers" >
                        </div>
                        <div class="form-group">
                            <p>Jumlah Barang yang di Sewa</p>
                            <input type="text" class="form-control" required name="amount_item" value="{{ old('amount_item') }}" >
                        </div>
                        <div class="form-group">
                            <p>Durasi</p>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="number" class="form-control" required name="duration" value="1" min="1">
                                </div>
                                <div class="col-md-10">
                                    Hari
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <p>Barang </p>
                            <select name="item_id" class="form-control">
                                <option value=""> - Pilih Barang - </option>
                                @foreach($item as $list)
                                    <option value="{{ $list->item_id }}" {{($list->item_id == old('item_id') ? 'selected' : '')}} >{{ $list->item_name }} - Rp. {{ number_format($list->price)." a day" }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Process</button>
            </form>
        </div>
    </div>

</section>
    
@endsection

@section('booking')
<script>
    $(document).ready(function(e){
        $('#client').keyup(function(){
            var client = $(this).val();
            if(client != ''){
                $.ajax({
                    url:"data-member",
                    method:"GET",
                    data:{data:client},
                    success:function(data){
                        $('#client-list').fadeIn();
                        $('#client-list').html(data);
                    }
                });
            }
        });
    });
    $(document).on('click', '.li-client', function(){
        $('#client').val($(this).text());
        var client_id = $('input[id="client"]').val();
        newClient = client_id.split(" ");
        $('#client_id').val(newClient[0]);
        $('#client-list').fadeOut();
    });
    $(document).on('click', '.li-client-null', function(){
        $('#client').val("");

        $('#client_id').val(newClient[0]);
        $('#client-list').fadeOut();
    });
    $("body").mouseup(function(e){
        if($(e.target).closest('#client').length==0){
            $('#client-list').stop().fadeOut();
        }
    });
</script>
@endsection