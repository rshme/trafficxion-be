<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $streetName = $this->faker->streetName();

        return [
            'slug' => Str::slug($streetName),
            'name' => $streetName,
            'city_name' => $this->faker->city(),
            'province_name' => $this->generateProvince()
        ];
    }

    public function generateProvince()
    {
        $states = [
            'California', 'Texas', 'Florida', 'New York', 'Pennsylvania', 'Illinois', 'Ohio', 'Georgia', 'North Carolina', 'Michigan',
            'New Jersey', 'Virginia', 'Washington', 'Arizona', 'Massachusetts', 'Tennessee', 'Indiana', 'Missouri', 'Maryland', 'Wisconsin'
        ];

        return $this->faker->randomElement($states);  // Random U.S. state
    }
}
