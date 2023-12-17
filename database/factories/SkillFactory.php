<?php

namespace Database\Factories;

use App\Enums\Skill\Levels;
use App\Enums\Skill\Skills;
use App\Models\CV;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $skillType = $faker->randomElement(Skills::asOptions());
        $skillSet = Arr::get(Skills::skillSets(), $skillType);

        return [
            'cv_id' => CV::factory(),
            'type' => $skillType,
            'name' => $faker->randomElement($skillSet),
            'level' => $faker->randomElement(array_keys(Levels::asOptions())),
        ];
    }
}
