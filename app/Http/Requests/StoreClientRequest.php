<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'age' => 'required|integer',
            'class' => 'sometimes|required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => __('clients.required'),
            'name.max' => 'Client Name must be at least 20 characters',
            'age.required' => 'Client Age is required',
            'age.integer' => 'Client Age musst be numeric',
            'class.required' => 'Client Class Not Required',
        ];
    }
}
