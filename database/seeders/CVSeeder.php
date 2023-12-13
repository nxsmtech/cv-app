<?php

namespace Database\Seeders;

use App\Models\CV;
use Illuminate\Database\Seeder;

class CVSeeder extends Seeder
{
    public function run(): void
    {
        CV::factory()
            ->count(10)
            ->create();
    }
}
