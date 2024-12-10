<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'short_name' => $this->faker->firstName,
            'staff_reference_id' => $this->faker->unique()->numberBetween(1 , 100),
            'phone_code' => '+1',
            'phone' => rand(1500000000, 1999999999),
            'line_manager' => 1,
            'gender' => $this->faker->randomElement([1, 2, 3]),
            'address' => $this->faker->address,
            'team_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'designation_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
