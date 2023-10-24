<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getTotalTransaction()
    {
        $successTransaction = Transaction::where('transaction_status', 'selesai')->count();
        $proccessTransaction = Transaction::where('transaction_status', 'proses')->count();
        $sentTransaction = Transaction::where('transaction_status', 'terkirim')->count();
        $canceledTransaction = Transaction::where('transaction_status', 'batal')->count();

        return response()->json([
            'sukses' => $successTransaction,
            'proses' => $proccessTransaction,
            'terkirim' => $sentTransaction,
            'batal' => $canceledTransaction,
        ]);
    }
}
