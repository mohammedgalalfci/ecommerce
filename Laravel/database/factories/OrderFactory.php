<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_number' =>$this->faker->unique()-> numberBetween(1,100),
            'name' => $this->faker->name(),
            'discount' => $this->faker-> randomDigit(),
            'price' => $this->faker-> randomDigit(),
            'quantity' => random_int(1,100),
            'country' => $this->faker-> country(),
            'city' => $this->faker-> city(),
            'full_address' => $this->faker-> address(),
            'house_no' =>  random_int(1,100),
            'status' => $this->faker->randomElement(['pending','processing','completed','canceled']),
            'phone' => $this->faker-> phoneNumber(),
            'payment_method' => $this->faker-> title(),
            'user_id' => random_int(1,5),
            'cart_id' => $this->faker->numberBetween(1,3),
        ];
    }
}
