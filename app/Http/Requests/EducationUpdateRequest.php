<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EducationUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|integer',
            'institution' => 'required|string|max:255',
            'grade' => 'required|integer',
            'status' => 'required|integer',
            'specialization' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ];
    }
}
