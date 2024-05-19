<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'min:2', 'max:255'],
            'email'    => ['required', 'string', 'email', 'unique:users,email'],
            'phone'    => ['required', 'numeric', 'unique:users,phone', 'regex:/^[0-9]+$/', 'min_digits:11', 'max_digits:13'],
            'password' => ['required', 'string', 'nullable', 'min:8', 'max:255', 'confirmed'],
        ];
    }
}
