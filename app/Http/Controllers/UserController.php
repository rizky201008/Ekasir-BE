<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail(Request $req)
    {
        return response()->json($req->user());
    }

    public function transactions(Request $req)
    {
        $transactions = $req->user()->transactions;
        return response()->json($transactions);
    }
}
