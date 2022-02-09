<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'degree' => $this->faker-> randomDigit(),
            'customer_id'=> random_int(1,10),
            'product_id'=> random_int(1,10),
        ];
    }
}
