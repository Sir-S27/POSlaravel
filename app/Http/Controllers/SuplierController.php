<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index(){
        return view("suplier.index");
    }

    public function edit($id){
      if ($id == 1) {
        $namaSuplier = "PT. Sumber Makmur";
    } else if ($id == 2) {
        $namaSuplier = "PT. Sejahtera Abadi";
    } else if ($id == 3) {
        $namaSuplier = "PT. Maju Jaya";
    } else if ($id == 4) {
        $namaSuplier = "PT. Sentosa Bersama";
    } else {
        return "Suplier Tidak Ada";
    }
       return view("suplier.edit", compact('id','namaSuplier'));
    }

    public function create(){
        return view("suplier.create");
    }

    public function store(Request $request){
        $kodeSuplier = $request->kode_suplier;
        $namaSuplier = $request->nama_suplier;
        $alamat = $request->alamat;
        $telepon = $request->telepon;
        return view("suplier.store", compact('kodeSuplier','namaSuplier','alamat','telepon'));
        
    }
}
