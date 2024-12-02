<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
        $rules =  [
            'title' => 'required|string|max:20',
            'description' => 'required|string|max:100',
            'priority' => 'required|numeric',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ' Filed Is Required',
            'numeric' => ' Filed Must Be Numeric',
        ];
    }
}
