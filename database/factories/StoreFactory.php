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
            'display_name' => $this->faker->name(),
            'address' => $this->faker->text(20),
            'phone_number' => '' . $this->faker->passthrough(rand(1111111111, 9999999999)),
            'email' => $this->faker->email(),
        ];
    }
}
