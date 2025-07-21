<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    protected $model = \App\Models\Bill::class;

    public function definition(): array
    {
        return [
            'to' => null,    // override explicitly in tests
            'from' => null,  // override explicitly in tests
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'status' => 'pendente', // default status
            'pixKey' => (string) Str::uuid(),
            'exp' => Carbon::now()->addMinutes(10), // expires in 10 minutes
        ];
    }
}
