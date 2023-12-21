<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

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
            'cv' => $cv->load(['education', 'skill', 'workExperience', 'personalDetail'])
        ]);
    }

    public function update(CV $cv, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $cv->update($validated);

        return redirect()->back();
    }

    public function updatePersonalDetail(CV $cv, Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $cv->personalDetail()->updateOrCreate($validated);

        return redirect()->back();
    }
}
