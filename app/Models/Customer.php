<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
    ];

    public function transaksiProduk()
    {
        return $this->hasMany(TransactionProduct::class);
    }

}
