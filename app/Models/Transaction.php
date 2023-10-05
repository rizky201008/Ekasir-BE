<?php

namespace App\Models;

use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function transactionDetail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
