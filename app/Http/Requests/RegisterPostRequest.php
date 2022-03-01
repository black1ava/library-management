<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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
            'name' => 'required',
            'gender' => 'required',
            'pob' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => ['required', 'confirmed'],
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please insert your name',
            'gender.required' => 'Please choose your gender',
            'pob.required' => 'Please enter your place of birth',
            'dob.required' => 'Please enter your date of birth',
            'address.required' => 'Please enter your current address',
            'password.required' => 'Please enter your password',
            'password.confirmed' => 'Password is not matched',
            'password_confirmation.required' => 'Please confirm your password'
        ];
    }
}
