<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['required', 'string', 'max:1024', ], // unicode characters take 2 bytes and 2 KB = 2048 B bytes so 2 KB = 2048/2 = 1024 char
            'phone_number' => ['required', 'numeric', 'digits:11'],
        ];
    }

}
