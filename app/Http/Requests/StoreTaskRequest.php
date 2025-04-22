<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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
