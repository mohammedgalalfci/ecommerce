<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->title(),
            'description' => $this->faker->text(),
            'image'=> $this->faker->image(),
            'image_path'=> $this->faker->image(),
            'subcat_id'=> random_int(1,10),
        ];
    }
}
