<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorPostRequest extends FormRequest
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
            'dob' => 'required',
            'pob' => 'required',
            'address' => 'required',
            'phone' => ['required', 'unique:authors'],
            'email' => ['required', 'unique:authors']
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Please enter author name',
            'gender.required' => 'Please select author gender',
            'dob.required' => 'Please enter author date of birth',
            'pob.required' => 'Plerase enter author place of birth',
            'phone.required' => 'Please enter author phone number',
            'email.required' => 'Please enter author email',
            'phone.unique' => 'This number is already taken',
            'email.unique' => 'This email is already taken'
        ];
    }
}
