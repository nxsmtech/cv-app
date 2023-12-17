<?php

namespace Database\Factories;

use App\Models\CV;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skill>
 */
class SkillFactory extends Factory
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
            //TODO change to random from array
            'type' => 'Soft',
            'name' => $faker->text(15),
            //TODO change to random from array dependent on Type
            'level' => 'Beginner',
        ];
    }
}
