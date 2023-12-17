<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CVController extends Controller
{
    public function create(): RedirectResponse
    {
        $cv = Cv::create([
            'title' => 'New CV title'
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

    public function store(Request $request)
    {
        dd($request->all());
        // Validate and store the data
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // For demonstration, just redirect back with a success message
        // In a real application, you would save this data to the database
        return redirect()->back()->with('message', 'CV created successfully!');
    }
}
