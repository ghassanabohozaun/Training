<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:10',
            'age' => 'required|integer',
            'salary' => 'required|numeric',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => __('employees.required'),
            'age.required' => __('employees.required'),
            'salary.required' => __('employees.required'),
        ];
    }
}
