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
        Schema::create('detail_transaksi', function (Blueprint $table) {
                $table->id('id_detail_transaksi');
                $table->unsignedBigInteger('id_transaksi');
                $table->unsignedBigInteger('id_produk');
                $table->integer('jumlah_produk');
                $table->decimal('subtotal', 10, 2);
                $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
