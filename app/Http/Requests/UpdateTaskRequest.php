<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Adjust as necessary for authorization checks
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|string',
            'priority' => 'required|string',
            'date' => 'nullable|date',
            'time_spent' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
            'link' => 'nullable|url',
        ];
    }
}
