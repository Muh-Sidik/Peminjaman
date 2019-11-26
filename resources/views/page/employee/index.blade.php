@extends('admin_lte.layouts')

@section('basic')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('pegawai.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data </a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Register Date</th>
                        @if(Auth::user()->level == 1)
                        <th>Action</th>
                        @else
                        <th>Edit</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee as $row)
                    @php $create = explode(' ', $row->created_at);  @endphp

                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $create[0] }}</td>
                    
                        <td> 
                            @if(Auth::user())
                            <a href="{{ route('pegawai.edit',  $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            @endif
                            @if(Auth::user()->level == 1)
                            <a data-id="{{$row->id}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                            @endif
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
                url : "{{url('/')}}/pegawai/delete/"+id,
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