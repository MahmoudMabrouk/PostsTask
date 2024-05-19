<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
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

            'phone' => ['required', 'numeric', 'exists:users,phone', 'regex:/^[0-9]+$/', 'min_digits:11', 'max_digits:13'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }

}
