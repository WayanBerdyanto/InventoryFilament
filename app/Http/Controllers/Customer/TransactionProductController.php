<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\TransactionProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionProductController extends Controller
{
    public function index()
    {
        $transaction = TransactionProduct::where('pelanggan_id', Auth::id())->get(); // Mengambil transaksi berdasarkan ID customer
        return view('customer.transaction.index', compact('transaction'));
    }
}
