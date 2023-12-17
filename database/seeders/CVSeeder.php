<?php

namespace Database\Seeders;

use App\Models\CV;
use App\Models\Education;
use App\Models\PersonalDetail;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;

class CVSeeder extends Seeder
{
    public function run(): void
    {
        CV::factory()
            ->count(10)
            ->has(PersonalDetail::factory())
            ->has(Education::factory()->count(2))
            ->has(WorkExperience::factory()->count(2))
            ->has(Skill::factory()->count(6))
            ->create();
    }
}
