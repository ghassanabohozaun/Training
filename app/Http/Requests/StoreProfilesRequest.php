<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfilesRequest extends FormRequest
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
        $rules  =  [
            'user_id' => 'required|integer|exists:users,id',
            'address' => 'required|string|max:20',
            'mobile' => 'nullable|string',
            'phone' => 'nullable|string',
            'birthday' => 'nullable|date',
            'bio' => 'nullable|string',
        ];

        return $rules;
    }

    public function messages()
    {
        return [

            'user_id.required' => 'User Id Is Required From messages',
            'user_id.integer' => 'User Id must be an be integer',
            'user_id.exists' => 'User Id  must be exists in users table',
            'address.required' => __('students.required')

        ];
    }
}
