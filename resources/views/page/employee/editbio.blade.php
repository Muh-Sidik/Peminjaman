@extends('admin_lte.layouts')

@section('basic')

<section class="content col-md-6">

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
                <form action="{{ route('pegawai.update', ['bio_id' => $bio->bio_id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-12">
                            <<div class="col-md-6">
                                    <div class="form-group">
                                        <p>Jabatan</p>
                                        <input type="text" class="form-control" required name="position" value="{{ old('position') }}">
                                    </div>
                                    <div class="form-group">
                                        <p>Telepon</p>
                                        <input type="number" class="form-control" required name="phone" value="{{ old('phone') }}">
                                    </div>
                                    <div class="form-group">
                                        <p>Alamat</p>
                                        <input type="text" class="form-control" required name="address" value="{{ old('positiom') }}" >
                                    </div>
                                <input type="hidden" name="user_id" value="{{$bio->user->id}}">
                                </div>
                        </div>
                
                    </div>
                    <button type="submit" class="btn btn-success">Edit Data</button>
                </form>
            </div>
        </div>
    </section> 



    
@endsection