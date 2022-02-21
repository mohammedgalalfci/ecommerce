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

            'size' =>$this->faker-> title(),
            'color' =>$this->faker-> colorName(),
            'product_id' => random_int(1,10),
        ];
    }
}
