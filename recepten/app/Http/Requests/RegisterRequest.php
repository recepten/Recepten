<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Het veld email is verplicht om in te vullen',
        ];
    }
}