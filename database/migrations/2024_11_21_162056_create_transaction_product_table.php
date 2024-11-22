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
        Schema::create('transaction_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('produk_id')->constrained('products');  // adjust table name if different
            $table->integer('jumlah');
            $table->decimal('harga_total', 10, 2);
            $table->string('status_pembayaran');  // Make sure it's string type
            $table->string('metode_pembayaran');  // Make sure it's string type
            $table->date('tanggal_transaksi');
            $table->date('tanggal_selesai');
            $table->string('status_transaksi');   // Make sure it's string type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_product');
    }
};
