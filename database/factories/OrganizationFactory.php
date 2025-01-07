<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\Industry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    public function definition(): array
    {
        $industryIds = Industry::pluck('id')->toArray();

        return [
            'tenant_id' => 1,
            'name' => $this->faker->company,
            'domain_name' => $this->faker->unique()->domainName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'owner_id' => 1,
            'industry_id' => $this->faker->randomElement($industryIds),
            'stakeholder_type' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'number_of_employees' => $this->faker->numberBetween(0, 4200000000),
            'annual_revenue' => $this->faker->numberBetween(0, 18000000000000000000),
            'timezone_id' => 1,
            'description' => $this->faker->paragraph,
        ];
    }
}
