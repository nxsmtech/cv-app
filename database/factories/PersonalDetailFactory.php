<?php

namespace Database\Factories;

use App\Models\CV;
use App\Models\PersonalDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PersonalDetail>
 */
class PersonalDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        return [
            'cv_id' => CV::factory(),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address
        ];
    }
}
