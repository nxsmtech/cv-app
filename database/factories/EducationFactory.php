<?php

namespace Database\Factories;

use App\Enums\EducationGrades;
use App\Enums\Skills;
use App\Models\CV;
use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Education>
 */
class EducationFactory extends Factory
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
            'institution' => $faker->city . ' ' . $faker->randomElement(['University', 'School', 'High School']),
            'grade' => $faker->randomElement(array_keys(EducationGrades::asOptions())),
            'specialization' => $faker->jobTitle,
            'start_date' => $startDate,
            'end_date' => $faker->dateTimeBetween($startDate)->format('Y-m-d')
        ];
    }
}
