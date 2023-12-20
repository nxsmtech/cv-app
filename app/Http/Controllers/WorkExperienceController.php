<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WorkExperienceController extends Controller
{
    public function update(CV $cv, Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable|integer',
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string'
        ]);

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
