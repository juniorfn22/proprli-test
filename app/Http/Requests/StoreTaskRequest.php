<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'building_id' => 'required|integer',
            'user_id' => 'required|integer',
            'description' => 'required|string',
            'status' => 'required|string',
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'building_id.required' => 'The building field is required.',
            'building_id.integer' => 'The building must be an integer.',
            'user_id.required' => 'The user field is required.',
            'user_id.integer' => 'The user must be an integer.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',

        ];
    }
}
