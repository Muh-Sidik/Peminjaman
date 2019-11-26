@extends('admin_lte.layouts')

@section('basic')

<section class="content">
        <div class="card card-secondary card-outline">
           
            <div class="card-body">
                <table class="table table-sm" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Waktu Pesanan</th>
                            <th>Kode Booking</th>
                            <th>Nama Penyewa</th>
                            <th>Nama Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking_data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->order_date }}</td>
                            <td>{{ $row->booking_code }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->item_name }}</td>
                            <td><a href="{{ route('pengembalian.information', $row->booking_code) }}" class="btn btn-primary btn-sm">Process Return</a></td>
                        </tr>
                        @endforeach
                    </tbody>
    
                </table>
            </div>
        </div>
    </section> 
    
    
@endsection