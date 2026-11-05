<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('kode_produk')->unique();
            $table->string('nama_produk', 100);
            $table->integer('stok');
            $table->integer('harga');
            $table->bigInteger('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
