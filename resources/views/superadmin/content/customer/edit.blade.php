@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.customer.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{$customer->name}}" class="form-control" placeholder="Nama" required>
        </div>



        <div class="form-group">
            <input type="hidden" name="id" value="{{$customer->id}}">
            <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
        </div>

    </form>

@endsection
