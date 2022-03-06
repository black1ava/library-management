<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentPostRequest extends FormRequest
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
        if($this->method() === 'PUT'){
            return [
                'name' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'pob' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required'
            ];
        }

        return [
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'address' => 'required',
            'phone' => ['required', 'unique:students'],
            'email' => ['required', 'unique:students']
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Please enter student name',
            'gender.required' => 'Please select student gender',
            'dob.required' => 'Please select student date of birth',
            'pob.required' => 'Please enter student place of birth',
            'address.reqired' => 'Please enter student current address',
            'phone.required' => 'Please enter student phone number',
            'phone.unique' => 'This phone number is already used',
            'email.required' => 'Please enter student email',
            'email.unique' => 'This email is aleady used'
        ];
    }
}
