<?php

namespace App\Http\Controllers;

use App\Http\Requests\CvUpdateRequest;
use App\Models\CV;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Response as HttpResponse;

class CVController extends Controller
{
    public function create(): RedirectResponse
    {
        $cv = Cv::create([
            'title' => Str::uuid()
        ]);

        return redirect()->route('cv.edit', $cv->id);
    }

    public function edit(CV $cv): Response
    {
        return Inertia::render('Edit', [
            'cv' => $cv->load(['education', 'skill', 'workExperience', 'personalDetail']),
        ]);
    }

    public function update(CV $cv, CvUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $cv->update($validated);

        return redirect()->back();
    }

    public function delete(CV $cv)
    {
        $cv->personalDetail()->delete();
        $cv->education()->delete();
        $cv->workExperience()->delete();
        $cv->skill()->delete();
        $cv->delete();
    }

    public function show(CV $cv): HttpResponse
    {
        $cv->load(['education', 'skill', 'workExperience', 'personalDetail']);
        $pdf = PDF::loadView('pdf', [
            'cv' => $cv->toArray(),
        ]);
        return $pdf->stream();
    }
}
