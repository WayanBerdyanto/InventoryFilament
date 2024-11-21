<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    use HasFactory;

    protected $table = 'transaction_product';

    protected $fillable = [
        'customer_id',
        'produk_id',
        'jumlah',
        'harga_total',
        'status_pembayaran',
        'metode_pembayaran',
        'status_transaksi',
        'alamat_pengiriman',
    ];

    /**
     * Relasi dengan model Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi dengan model Produk
     */
    public function produk()
    {
        return $this->belongsTo(Product::class);
    }
}
