<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total_price' => random_int(1,5),
            'products_number' => random_int(1,100),
            'status' => $this->faker->randomElement(['waiting' ,'completed']),
            'store_id' => random_int(1,10),
            'user_id' => random_int(1,10),
        ];
    }
}
