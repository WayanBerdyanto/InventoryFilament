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
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); 
            $table->foreignId('produk_id')->constrained('products')->onDelete('cascade'); 
            $table->integer('jumlah'); 
            $table->decimal('harga_total', 15, 2);
            $table->enum('status_pembayaran', ['pending', 'paid', 'failed'])->default('pending'); 
            $table->string('metode_pembayaran')->nullable(); 
            $table->enum('status_transaksi', ['in_process', 'shipped', 'completed', 'cancelled'])->default('in_process'); 
            $table->text('alamat_pengiriman')->nullable(); 
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
