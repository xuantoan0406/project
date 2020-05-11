<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
    { {
            return [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'cfPassword' => 'required|same:password'
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Enter the name again',
            'name.unique' => 'name already exists',
            'email.required' => 'Enter the mail again',
            'email.unique' => 'email already exists',
            'email.email' => 'not is email',
            'password.required' => 'password not empty',
            'cfPassword.same' => "password not same",
            'cfPassword.required' => 'cfpassword not empty'
        ];
    }
}
