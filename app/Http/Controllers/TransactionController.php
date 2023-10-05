<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TransactionController extends Controller
{
    public $transactions;
    function __construct()
    {
        $this->transactions = Transaction::all();
    }

    function getTransactions()
    {
        return response()->json($this->transactions);
    }

    function insertTransaction(Request $request)
    {
        $request->validate([
            'total' => 'required',
            'payment_status' => 'required',
            'payment_amount' => 'required',
            'change_amount' => 'required',
            'payment_method' => 'required',
        ]);

        $transaction = Transaction::create(
            [
                'total' => $request->total,
                'payment_status' => $request->payment_status,
                'payment_amount' => $request->payment_amount,
                'change_amount' => $request->change_amount,
                'payment_method' => $request->payment_method,
                'user_id' => $request->user()->id
            ]
        );

        $data = $request->data;

        foreach ($data as $datas) {
            TransactionDetail::create(
                [
                    'product' =>   1,
                    'price' => $datas['price'],
                    'qty' => $datas['qty'],
                    'transaction_id' => $transaction->id
                ]
            );
        }

        return response()->json([
            'message' => 'Transaction created!'
        ], 201);
    }
}
