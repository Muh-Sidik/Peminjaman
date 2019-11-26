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
            <form action="{{ route('kategori.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Nama Kategori</p>
                            <input type="text" class="form-control" required name="category_name" value="{{ old('category_name') }}" >
                        </div>

                    </div>
            
                </div>
                <button type="submit" class="btn btn-success">Simpan Data</button>
            </form>
        </div>
    </div>
</section>



    
@endsection