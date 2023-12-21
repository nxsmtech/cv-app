<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PersonalDetailController extends Controller
{
    public function update(CV $cv, Request $request): RedirectResponse
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
