<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationUpdateRequest;
use App\Models\CV;
use App\Models\Education;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class EducationController extends Controller
{
    public function update(CV $cv, EducationUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Education::updateOrCreate(
            ['id' => Arr::get($validated, 'id')],
            [
                'cv_id' => $cv->id,
                'institution' => $validated['institution'],
                'grade' => $validated['grade'],
                'status' => $validated['status'],
                'specialization' => $validated['specialization'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]);

        return redirect()->back();
    }

    public function delete(Education $education)
    {
        $education->delete();
    }
}
