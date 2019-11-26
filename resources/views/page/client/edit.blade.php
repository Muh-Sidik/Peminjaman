@extends('admin_lte.layouts')

@section('basic')

<section class="content col-md-12">

    @if ($errors->any())
        
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
           
    @endif

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Form {{$title}} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('updatePelanggan', $client->client_id) }}" method="POST">
                {{ csrf_field() }}
                {{-- {{ method_field('PUT') }} --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>ID Member</p>
                            <input class="form-control" type="text" name="no_member" value="{{$client->no_member}}" readonly>
                        </div>
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="name" value="{{ $client->name }}" >
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir</p>
                            <input type="text" class="form-control" required name="dob" value="{{ $client->dob }}" id="datepicker">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Telepon</p>
                            <input type="number" class="form-control" required name="phone" value="{{ $client->phone }}">
                        </div>
                        <div class="form-group">
                            <p>Gender</p>
                            <select name="gender" class="form-control">
                                <option value="Pria" {{ ($client->gender == 'Pria' ? "selected":"") }}>Pria</option>
                                <option value="Wanita" {{ ($client->gender == 'Wanita' ? "selected":"") }}>Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" name="address" value="{{ $client->address }}" >
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Edit Data</button>
            </form>
        </div>
    </div>
</section> 



    
@endsection