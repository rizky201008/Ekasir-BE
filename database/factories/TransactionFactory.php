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
            'payment_status' => $this->getStatus(rand(0, 1)),
            'payment_amount' => rand(10000, 1000000),
            'payment_method' => $this->getPaymentMethod(rand(0, 1)),
            'user_id' => rand(1, 10)
        ];
    }

    function getStatus($status)
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
}
