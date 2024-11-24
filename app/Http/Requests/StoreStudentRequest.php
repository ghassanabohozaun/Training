<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'age' => 'required|numeric',
            'grade' => 'nullable|numeric'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => __('students.required'),
            'name.max' => 'Student name must be no more than 20 characters',
            'age.required' => 'Student age is required',
            'age.numeric' => __('students.numeric'),

        ];
    }
}
