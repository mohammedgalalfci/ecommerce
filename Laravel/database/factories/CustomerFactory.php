<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name(),
            'customer_email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'full_address' => $this->faker->address(),
            'house_no' => $this->random_int(1,100),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'phone' =>$this->faker-> phoneNumber(),
        ];
    }
}
