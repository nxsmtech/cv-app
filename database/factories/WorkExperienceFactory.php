<?php

namespace Database\Factories;

use App\Models\CV;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkExperience>
 */
class WorkExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $startDate = $faker->date;
        return [
            'cv_id' => CV::factory(),
            'company_name' => $faker->company,
            'position' => $faker->jobTitle,
            'start_date' => $startDate,
            'end_date' => $faker->dateTimeBetween($startDate)->format('Y-m-d'),
            'description' => $faker->realText(150)
        ];
    }
}
