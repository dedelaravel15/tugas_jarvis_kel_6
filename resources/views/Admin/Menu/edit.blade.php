<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{$product->name}}</title>
</head>
<body>

    <form action="{{route('update', $product)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <input type="text" name="name" placeholder="Nama Produk" value="{{$product->name}}"><br>
        <input type="text" name="description" placeholder="Deskripsi Produk" value="{{$product->description}}"><br>
        <input type="text" name="price" placeholder="Harga" value="{{$product->price}}"><br>
        <input type="text" name="stock" placeholder="Stok Barang" value="{{$product->stock}}"><br>
        <input type="file" name="image" ><br>
        <img src="{{url('storage/',$product->image)}}" alt="" srcset="" height="100px" width="100px"><br>
        <button type="submit">Ubah</button>
    </form>
</body>
</html>
