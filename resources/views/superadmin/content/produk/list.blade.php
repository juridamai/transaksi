@extends('superadmin/layout/main')
@section('content')

    <a href="{{route('superadmin.produk.add')}}" class="btn btn-sm btn-primary">Tambah Data</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga Produk</th>
            <th scope="col">Stok Produk</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>

        @foreach($product as $row)

            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->price}}</td>
                <td>{{$row->stock}}</td>
                <td>{{$row->kategori}}</td>
                <td>
                    <a href="" data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Apakah anda yakin?')" href="" data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

        @endforeach



        </tbody>
    </table>

    {{$product->links()}}

@endsection
