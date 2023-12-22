<?php

namespace App\Http\Controllers;

use App\Enums\Skill\Levels;
use App\Models\CV;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function update(CV $cv, Request $request)
    {
        $validated = $request->validate([
            'skills.Technical' => 'nullable|array',
            'skills.Soft' => 'nullable|array',
            'skills.Leadership' => 'nullable|array',
            'skills.Language' => 'nullable|array',
        ]);

        foreach ($validated['skills'] as $type => $skills) {
            foreach ($skills as $skillName) {
                $cv->skill()->updateOrCreate(
                    ['type' => $type, 'name' => $skillName],
                    ['level' => array_search(Levels::EXPERT->value, Levels::asOptions())]
                );
            }

            // Optionally, delete skills that were removed
            $cv->skill()->where('type', $type)->whereNotIn('name', $skills)->delete();
        }

        return redirect()->back();
    }
}
