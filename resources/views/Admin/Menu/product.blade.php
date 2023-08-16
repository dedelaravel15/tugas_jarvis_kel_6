@extends('Admin.Style.product');

@section('product')
@if (session()->has('edit'))
    {{session('edit')}}
@endif
<br>
@if (session()->has('delete'))
    {{session('delete')}}
@endif
<br>
<a href="{{route('add_product')}}" class="text-decoration-none"> Tambah produk</a>
    <table class="table">
        <tr>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok barang</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><img src="{{url('storage/'.$product->image)}}" alt="gambar" height="100px"  width="100px"></td>
                <td>
                    <form action="{{route('edit', $product)}}" method="get">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>
                    <form action="{{route('delete', $product)}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
