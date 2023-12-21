<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
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
            'cv' => $cv->load(['education', 'skill', 'workExperience', 'personalDetail']),
        ]);
    }

    public function update(CV $cv, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $cv->update($validated);

        return redirect()->back();
    }

    public function show(): View
    {
        return view('index');
    }
}
