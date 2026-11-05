<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $nama_produk = $request->nama_produk;
        $id_kategori = $request->id_kategori;
        $kategori = DB::table('kategori')->get();
        $query = DB::table('products')
            ->leftJoin('kategori', 'products.id_kategori', '=', 'kategori.id')
            ->select('products.*', 'kategori.nama_kategori');
        if ($id_kategori != "") {
            $query->where('products.id_kategori', $id_kategori);
        }
        if ($nama_produk != "") {
            $query->where('products.nama_produk', 'like', '%' . $nama_produk . '%');
        }
        $produk = $query->paginate(5);
        return view("produk.index", compact('produk', 'kategori'));
    }

    public function create()
    {
        $kategori = DB::table('kategori')->get();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        try {
            DB::table('products')->insert([
                'kode_produk' => $request->input('kode_produk'),
                'nama_produk' => $request->input('nama_produk'),
                'stok'        => $request->input('stok'),
                'harga'       => $request->input('harga'),
                'id_kategori' => $request->input('id_kategori'),
            ]);
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        $produk   = DB::table('products')->where('id', $id)->first();
        $kategori = DB::table('kategori')->get();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::table('products')->where('id', $id)->update([
                'kode_produk' => $request->input('kode_produk'),
                'nama_produk' => $request->input('nama_produk'),
                'stok'        => $request->input('stok'),
                'harga'       => $request->input('harga'),
                'id_kategori' => $request->input('id_kategori'),
            ]);
            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('products')->where('id', $id)->delete();
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
