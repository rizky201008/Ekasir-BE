<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total' => rand(1000000, 5000000),
            'payment_status' => $this->getPaymentStatus(rand(0, 1)),
            'payment_amount' => rand(10000, 1000000),
            'payment_method' => $this->getPaymentMethod(rand(0, 1)),
            'transaction_status' => $this->getTransactionStatus(rand(0,3)),
            'user_id' => rand(1, 10)
        ];
    }

    function getPaymentStatus($status)
    {
        if ($status == 1) {
            return 'lunas';
        } else {
            return 'hutang';
        }
    }

    function getPaymentMethod($payment)
    {
        if ($payment == 1) {
            return 'transfer';
        } else {
            return 'cash';
        }
    }

    function getTransactionStatus($status)
    {
        switch ($status) {
            case 0:
                return 'selesai';
                break;
            case 1:
                return 'terkirim';
                break;
            case 2:
                return 'batal';
                break;

            default:
                return 'proses';
                break;
        }
    }
}
