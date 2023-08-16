@extends('Admin.Style.add_product')

@section('content')
@if (session()->has('message'))
    {{session('message')}}
@endif
    <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Nama Produk"><br>
        <input type="text" name="description" placeholder="Deskripsi Produk"><br>
        <input type="text" name="price" placeholder="Harga"><br>
        <input type="text" name="stock" placeholder="Stok Barang"><br>
        <input type="file" name="image" id="image"><br>

        <div class="preview" id="preview">

        </div>
        <button type="submit">Tambah</button>
    </form>
@endsection
