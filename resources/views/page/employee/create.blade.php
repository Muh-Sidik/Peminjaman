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
            <form action="{{ route('pegawai.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Nama</p>
                            <input type="text" class="form-control" required name="name" value="{{ old('name') }}" >
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="email" class="form-control" required name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <p>Password</p>
                            <input type="password" class="form-control" required name="password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <p>Re-type Password</p>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
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
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    </div> --}}
                </div>
                <button type="submit" class="btn btn-success">Simpan Data</button>
            </form>
        </div>
    </div>
</section> 

@endsection
