<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => 'sometimes',
            'age' => 'sometimes|integer',
            'salary' => 'sometimes|numeric',
        ];
        return $rules;
    }


    public function messages()
    {
        return [
            'age.integer' => 'My Age must be an integer',
            'salary.numeric' => 'My salary must be numeric',
        ];
    }
}
