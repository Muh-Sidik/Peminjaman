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
                <h3 class="card-title">Edit {{$title}} </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('updateBarang', $item->item_id) }}" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="row">
                        <div class="col-md-6">
                                {{-- <input type="hidden" name="item_id" value="{{$item->item_id}}"> --}}
                            <div class="form-group">
                                <p>Nama Barang</p>
                                <input type="text" class="form-control" required name="item_name" value="{{ $item->item_name }}" >
                            </div>
                            <div class="form-group">
                                <p>Jumlah</p>
                                <input type="number" class="form-control" required name="amount" value="{{ $item->amount }}">
                            </div>
                            <div class="form-group">
                                <p>Harga</p>
                                <input type="number" class="form-control" required name="price" value="{{ $item->price }}">
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Tipe Barang</p>
                                <select name="type" class="form-control">
                                    <option>- Pilih Tipe -</option>
                                    <option value="Umum" {{ ($item->type == 'Umum' ? "selected":"") }}>Umum</option>
                                    <option value="Khusus" {{ ($item->type == 'Khusus' ? "selected":"") }}>Khusus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Kategori</p>
                                <select name="category_id" class="form-control">
                                    <option value="">- Pilih Kategori -</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->category_id}}" {{($item->category_id == $row->category_id ? 'selected' : '')}} >{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Edit Data</button>
                </form>
            </div>
        </div>
    </section> 



    
@endsection