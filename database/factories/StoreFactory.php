<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'display_name' => $this->faker->company(),
            'address' => $this->faker->streetAddress(),
            'phone_number' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->companyEmail(),
        ];
    }
}
