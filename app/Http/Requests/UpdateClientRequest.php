<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:20',
            'age' => 'sometimes|required|integer',
            'class' => 'sometimes',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.max' => 'Client Name must be at least 20 characters',
            'age.integer' => 'Client Age musst be numeric',
        ];
    }
}
