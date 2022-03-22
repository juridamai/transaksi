@extends('superadmin/layout/main')
@section('content')

    @php
        $total = 0;
    @endphp

    <label>Id: {{$transaction->id}}</label><br/>
    <label>Tanggal: {{$transaction->date}}</label><br/>
    <label>Pembeli: {{$transaction->name}}</label>

    <p></p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Produk</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Banyaknya</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        @foreach($item as $row)

            @php
                $total += $row->price;
            @endphp

            <tr>
                <td>{{$row->product_name}}</td>
                <td>{{$row->product_price}}</td>
                <td>{{$row->qty}}</td>
                <td>{{$row->price}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>

    <label>Total Bayar: {{$total}}</label><br/>

    <a href="{{route('superadmin.transaction.index')}}"><i class="fa fa-arrow-circle-left"></i> Kembali</a>

@endsection
