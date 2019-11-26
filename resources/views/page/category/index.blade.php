@extends('admin_lte.layouts')

@section('basic')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Kategori</a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm striped" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $row)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row->category_name }}</td>
                        <td> 
                            <a href="{{ route('kategori.edit',  $row->category_id) }}" class="btn btn-sm btn-success"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row->category_id}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
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
                url : "{{url('/')}}/kategori/delete/"+id,
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