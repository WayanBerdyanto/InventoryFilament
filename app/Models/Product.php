<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nama',
        'stok',
        'harga',
        'deskripsi',
    ];

    public function transaksiProduk()
    {
        return $this->hasMany(TransactionProduct::class);
    }

}
