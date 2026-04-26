<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = [''];
        $searchableColumns = [''];
        $pageData['dataProduk'] = Product::filter($request, $filterableColumns, $searchableColumns)
            ->paginate(7)
            ->withQueryString();

        foreach ($pageData['dataProduk'] as $product) {
            $product->foto = $product->foto ? Storage::url($product->foto) : asset('images/default-product.jpg');
        }
        return view('admin.product.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'foto' => ['required', 'mimes:jpeg,jpg,png', 'image', 'max:5120'],
            'harga' => ['required'],
            'stok' => ['required'],
        ]);
        $data['nama_produk'] = $request->nama_produk;
        $data['harga'] = $request->harga;
        $data['stok'] = $request->stok;
        $data['is_best_seller'] = $request->has('is_best_seller');

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('product', 'public');
            $data['foto'] = $path;
        } else {
            $data['foto'] = 'images/default-product.jpg';
        }

        Product::create($data);
        return redirect()->route('product.list')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataProduct'] = Product::findOrFail($param1);
        return view('admin.product.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required'],
            'foto' => ['required', 'mimes:jpeg,jpg,png', 'image', 'max:5120'],
            'harga' => ['required'],
            'stok' => ['required'],
        ]);
        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);

        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->is_best_seller = $request->has('is_best_seller');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto && Storage::exists('public/' . $product->foto)) {
                Storage::delete('public/' . $product->foto);
            }
            // Simpan foto baru
            $path = $request->file('foto')->store('product', 'public');
            $product->foto = $path;
        }

        $product->save();
        return redirect()->route('product.list')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = Product::findOrFail($param1);
        $user->delete();

        return redirect()->route('product.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
