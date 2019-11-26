@extends('admin_lte.layouts')

@section('basic')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('pelanggan.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Member</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th>Register Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client as $row)
                    @php $create = explode(' ', $row->created_at);  @endphp

                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row->no_member }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->dob }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $create[0] }}</td>
                        <td> 
                            <a href="{{ route('pelanggan.edit',  $row->client_id) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row->client_id}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
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
                url : "{{url('/')}}/pelanggan/delete/"+id,
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



    
