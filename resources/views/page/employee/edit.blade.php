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
                <form action="{{ route('updatePegawai', $employee->id) }}" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Name</p>
                                <input type="text" class="form-control" required name="name" value="{{ $employee->name }}" >
                            </div>
                            <div class="form-group">
                                <p>Email</p>
                                <input type="email" class="form-control" required name="email" value="{{ $employee->email }}">
                            </div>
                            <div class="form-group">
                                <p>Password</p>
                            <input type="text" class="form-control" required name="password" value="{{ $employee->password }}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <p>Jabatan</p>
                            <input type="text" class="form-control" required name="position" value="{{ $employee->position }}">
                        </div>
                        <div class="form-group">
                                <p>Telepon</p>
                                <input type="number" class="form-control" required name="phone" value="{{ $employee->phone }}">
                            </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="form-control" required name="address" value="{{ $employee->address }}" >
                        </div>
                    </div>
                
                    </div>
                    <button type="submit" class="btn btn-success">Edit Data</button>
                </form>
            </div>
        </div>
    </section> 



    
@endsection