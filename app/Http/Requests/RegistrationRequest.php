<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     *
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^[A-Z][a-z]{2,12}$/',
            'username' => 'required|regex:/^[A-z0-9]{2,15}$/',
            'password' => 'required|regex:/^[A-Z]+[A-z0-9]{5,}$/',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Enter your name',
            'name.regex' => 'Name: First letter need to be capital and name can not be less than 3 letters and only letters allowed',
            'username.required' => 'Enter your username',
            'username.regex' => 'Username: Only letters and numbers allowed minimum number of characters is 2 and maximum is 15',
            'password.required' => 'Enter password',
            'password.regex' => 'Password: First letter need to be capital,password must include digits and can not be less than 6 characters',
            'email.required' => 'Enter your mail',
        ];
    }

}
