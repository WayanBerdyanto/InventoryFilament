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
        Schema::table('transaction_product', function (Blueprint $table) {
            $table->string('alamat_pengiriman')->nullable()->after('status_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaction_product', function (Blueprint $table) {
            $table->dropColumn('alamat_pengiriman');
        });
    }
};
