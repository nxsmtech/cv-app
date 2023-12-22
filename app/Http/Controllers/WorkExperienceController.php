<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkExperienceUpdateRequest;
use App\Models\CV;
use App\Models\WorkExperience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class WorkExperienceController extends Controller
{
    public function update(CV $cv, WorkExperienceUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        WorkExperience::updateOrCreate(
            ['id' => Arr::get($validated, 'id')],
            [
                'cv_id' => $cv->id,
                'company_name' => $validated['company_name'],
                'position' => $validated['position'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'description' => $validated['description'],
            ]);

        return redirect()->back();
    }

    public function delete(WorkExperience $workExperience)
    {
        $workExperience->delete();
    }
}
