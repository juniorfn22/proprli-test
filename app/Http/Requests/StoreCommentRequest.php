<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'task_id' => 'required|integer|exists:tasks,id',
            'user_id' => 'required|integer|exists:users,id',
            'content' => 'required|string'
        ];
    }

    public function messages(): array {
        return [
          'task_id.required' => 'Task id is required.',
          'task_id.integer' => 'Task id must be an integer.',
          'task_id.exists' => 'Task id does not exist.',
          'user_id.required' => 'User is required.',
          'user_id.integer' => 'User must be an integer.',
          'user_id.exists' => 'User does not exist.',
          'content.required' => 'Content is required.',
          'content.string' => 'Content must be string.',
        ];
    }
}
