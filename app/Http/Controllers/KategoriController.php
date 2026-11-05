<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {  
        $nama_kategori = $request->nama_kategori;
        //$kategori = DB::table('kategori');
        $query = DB::table('kategori');
        if ($nama_kategori != "") {
            $query->where('nama_kategori', 'like', '%'.$nama_kategori.'%');
        }
        $kategori = $query->paginate(5);
        return view("kategori.index", compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori')->where(' id', $id)->first();
        return view("kategori.edit", compact('kategori'));
    }

    public function create()
    {
        return view("kategori.create");
    }

    public function store(Request $request)
    {
        $nama_kategori = $request->nama_kategori;
        try {
            DB::table('kategori')->insert([
                'nama_kategori' => $nama_kategori
            ]);
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function update($id, Request $request)
    {
        $nama_kategori = $request->input('nama_kategori');

        try {
            DB::table('kategori')->where('id', $id)->update([
                'nama_kategori' => $nama_kategori
            ]);
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('kategori')->where('id', $id)->delete();
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}