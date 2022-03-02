<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
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
            'title' => 'required',
            'publish_date' => 'required',
            'num_of_pages' => 'required',
            'num_copies' => 'required',
            'edition' => 'required',
            'publisher' => 'required',
            'book_source' => 'required',
            'book_type_id' => 'required',
            'authors' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please enter book title',
            'publish_date.required' => 'Please enter book publish date',
            'num_of_pages.required' => 'Please enter book number of pages',
            'num_copies.required' => 'Please enter book numner copies',
            'edition.required' => 'Please enter book editions',
            'publisher.required' => 'Please enter book publisher',
            'book_source.required' => 'Please enter book source',
            'book_type_id.required' => 'Please select book type',
            'author.required' => 'Please select an author'
        ];
    }
}
