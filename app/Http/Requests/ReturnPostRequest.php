<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReturnPostRequest extends FormRequest
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
            'student_id' => 'required',
            'book_id' => 'required',
            'return_date' => 'required'
        ];
    }

    public function messages(){
        return [
            'student_id.required' => 'Please select a student',
            'book_id.required' => 'Please select a book',
            'return_date.required' => 'Please set return date'
        ];
    }
}
