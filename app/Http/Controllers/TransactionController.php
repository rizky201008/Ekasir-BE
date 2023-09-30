<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
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
        $data = $request->data;

        foreach ($data as $datas) {
            Transaction::create(
                [
                    'user_id' =>   1,
                    'product_id' => $datas['product_id'],
                    'qty' => $datas['qty'],
                    'price' => $datas['price'],
                    'status' => $datas['status'],
                ]
            );
        }
        
        return response()->json([
            'message' => 'Transaction created!'
        ], 201);

    }
}
