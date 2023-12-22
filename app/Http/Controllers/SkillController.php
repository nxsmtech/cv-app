<?php

namespace App\Http\Controllers;

use App\Enums\Skill\Levels;
use App\Http\Requests\SkillUpdateRequest;
use App\Models\CV;
use Illuminate\Http\RedirectResponse;

class SkillController extends Controller
{
    public function update(CV $cv, SkillUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        foreach ($validated['skills'] as $type => $skills) {
            foreach ($skills as $skillName) {
                $cv->skill()->updateOrCreate(
                    ['type' => $type, 'name' => $skillName],
                    ['level' => array_search(Levels::EXPERT->value, Levels::asOptions())]
                );
            }

            $cv->skill()->where('type', $type)->whereNotIn('name', $skills)->delete();
        }

        return redirect()->back();
    }
}
