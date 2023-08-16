<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class AdminController extends Controller
{
    public function add_product()
    {
        return view('Admin.Menu.add_product');
    }
    public function store_add_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required'
        ]);
        $file = $request->file('image');
        $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path
        ]);
        if($product){
            return redirect()->route('add_product')->with('message', 'Produk berhasil di tambahkan');
        }else{
            return redirect()->route('add_product')->with('message', 'Produk gagal di tambahkan');
        }
    }
    public function product()
    {
        $products = Product::all();
        return view('Admin.Menu.product', compact('products'));
    }
    public function edit(Product $product)
    {
        return view('Admin.menu.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $file = $request->file('image');
        $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required'
        ]);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path
        ]);
        return redirect()->route('product')->with('edit', 'Data berhasil di ubah');
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product')->with('delete', 'Data berhasil di hapus');
    }
 }
