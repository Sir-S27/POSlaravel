<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Products;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $nama_produk = $request->nama_produk;
        $id_kategori = $request->id_kategori;
        // $kategori = DB::table('kategori')->get();
        // $query = DB::table('products')
        //     ->leftJoin('kategori', 'products.id_kategori', '=', 'kategori.id')
        //     ->select('products.*', 'kategori.nama_kategori');
        // if ($id_kategori != "") {
        //     $query->where('products.id_kategori', $id_kategori);
        // }
        // if ($nama_produk != "") {
        //     $query->where('products.nama_produk', 'like', '%' . $nama_produk . '%');
        // }

        $query = Products::query();
        $query->with('kategori');
        if ($nama_produk != "") {
            $query->where('products.nama_produk', 'like', '%' . $nama_produk . '%');
        }
        if ($id_kategori != "") {
            $query->where('products.id_kategori', $id_kategori);
        }
        $produk = $query->paginate(5);
        $kategori = Kategori::all();
        return view("produk.index", compact('produk', 'kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $kode_produk = $request->kode_produk;
        $nama_produk = $request->nama_produk;
        $stok = $request->stok;
        $harga = $request->harga;
        $id_kategori = $request->id_kategori;

        $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk|max:5',
            'nama_produk' => 'required',
            'stok'        => 'required|numeric',
            'harga'       => 'required|numeric',
            'id_kategori' => 'required|exists:kategori,id',
        ]);
        try {
            // DB::table('products')->insert([
            //     'kode_produk' => $request->input('kode_produk'),
            //     'nama_produk' => $request->input('nama_produk'),
            //     'stok'        => $request->input('stok'),
            //     'harga'       => $request->input('harga'),
            //     'id_kategori' => $request->input('id_kategori'),
            // ]);
            Products::create([
                'kode_produk' => $kode_produk,
                'nama_produk' => $nama_produk,
                'stok'        => $stok,
                'harga'       => $harga,
                'id_kategori' => $id_kategori,
            ]);
            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        // $produk   = DB::table('products')->where('id', $id)->first();
        // $kategori = DB::table('kategori')->get();
        $produk   = Products::find($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update($id, Request $request)
    {
        $produk = $request->input('produk');
        try {
            // DB::table('products')->where('id', $id)->update([
            //     'kode_produk' => $request->input('kode_produk'),
            //     'nama_produk' => $request->input('nama_produk'),
            //     'stok'        => $request->input('stok'),
            //     'harga'       => $request->input('harga'),
            //     'id_kategori' => $request->input('id_kategori'),
            // ]);
            $kode_produk = $request->input('kode_produk');
            $nama_produk = $request->input('nama_produk');
            $stok = $request->input('stok');
            $harga = $request->input('harga');
            $id_kategori = $request->input('id_kategori');
            Products::where('id', $id)->update([
                'kode_produk' => $kode_produk,
                'nama_produk' => $nama_produk,
                'stok'        => $stok,
                'harga'       => $harga,
                'id_kategori' => $id_kategori,
            ]);
            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('produk.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            // DB::table('products')->where('id', $id)->delete();
            Products::where('id', $id)->delete();
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
