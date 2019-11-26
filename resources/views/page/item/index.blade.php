@extends('admin_lte.layouts')

@section('basic')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('barang.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Baru </a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm striped" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tipe Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($item as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->item_name }}</td>
                        <td>{{ $row->amount }}</td>
                        <td>{{ $row->type }}</td>
                        <td>{{ $row->category->category_name }}</td>
                        <td>{{ number_format($row->price) }}</td>
                        <td> 
                            
                            <a href="{{ route('barang.edit',  $row->item_id) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row->item_id}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section> 

    
@endsection

@section('scripts')
<script>
    // function getData() {
    //     $.ajax({
    //  type: "GET",
    //  url: '{{url('/')}}/pegawai',
    //  success: function(response){
    //     $.each(response, function(i, item) {
    //     var $tr = $('<tr>').append(
    //         $('<td>').text(item.rank),
    //         $('<td>').text(item.content),
    //         $('<td>').text(item.UID)
    //     ); //.appendTo('#records_table');
    //     // console.log($tr.wrap('<p>').html());
    // });
//      }
// });
//     }
    $(".delete-btn").click(function(){
        let id = $(this).attr('data-id');
        if(confirm("Apa anda yakin akan menghapus? ")) {
            $.ajax({
                url : "{{url('/')}}/barang/delete/"+id,
                method : "POST",
                data : {
                    _token : "{{csrf_token()}}",
                    _method : "DELETE",
                }
            })
            .then(function(data){
                location.reload();
            });
        }
    })
</script>
@endsection