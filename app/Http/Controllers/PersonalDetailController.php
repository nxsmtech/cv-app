<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalDetailUpdateRequest;
use App\Models\CV;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class PersonalDetailController extends Controller
{
    public function update(CV $cv, PersonalDetailUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $cv->personalDetail()->updateOrCreate(
            ['id' => Arr::get($validated, 'id')],
            [
                'cv_id' => $cv->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
            ]
        );
        return redirect()->back();
    }
}
