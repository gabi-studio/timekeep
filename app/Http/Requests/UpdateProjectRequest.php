<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Adjust as necessary for authorization checks
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'project_type' => 'required|string',
            'status' => 'required|string',
            'client' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'estimated_hours' => 'nullable|integer|min:0',
            'actual_hours' => 'nullable|integer|min:0',
            'priority' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|string',
            'notes' => 'nullable|string',
        ];
    }
}
