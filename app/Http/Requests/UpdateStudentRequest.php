<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
        $rules = [
            'name' => 'sometimes|string|max:20',
            'age' => 'sometimes|numeric',
            'grade' => 'nullable|numeric'
        ];

        return $rules;
    }


    public function messages()
    {
        return [
            'name.max' => 'Student name must be no more than 20 characters',
            'age.numeric' => 'Student age must be numeric',
        ];
    }
}
