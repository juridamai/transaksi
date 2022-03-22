@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.produk.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Nama" required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" placeholder="Harga" required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" placeholder="Stok" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option disabled selected>Pilih Kategori</option>
                @foreach($kategori as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
        </div>

    </form>

@endsection
