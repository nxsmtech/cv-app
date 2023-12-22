<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SkillUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'skills.Technical' => 'nullable|array',
            'skills.Soft' => 'nullable|array',
            'skills.Leadership' => 'nullable|array',
            'skills.Language' => 'nullable|array',
        ];
    }
}
