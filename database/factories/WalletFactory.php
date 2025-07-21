<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WalletFactory extends Factory
{
    protected $model = \App\Models\Wallet::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // For 'owner', use null or 1 as placeholder; you can override in tests
            'owner' => null,
            'value' => $this->faker->randomFloat(2, 0, 1000), // float with 2 decimals between 0 and 1000
        ];
    }
}
