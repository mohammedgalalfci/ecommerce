<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'price' =>$this->faker-> randomDigit(),
            'size' =>$this->faker-> title(),
            'color' =>$this->faker-> colorName(),
            'discount' => $this->faker-> randomDigit(),
            'product_id' => random_int(1,10),
        ];
    }
}
