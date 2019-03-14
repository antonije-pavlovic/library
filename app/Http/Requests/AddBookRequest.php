<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
            "title" => "required",
            "pages" => "required",
            "year" => "required",
            "isbn" => "required",
            "description" => "required",
            "picture" => "required",
            "price" => "required",
            "author" => "required",
            "category" => "required",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Enter title",
            "pages.required" => "Enter pages",
            "year.required" => "Enter year",
            "isbn.required" => "Enter isbn",
            "description.required" => "Enter description",
            "picture.required" => "Enter picture",
            "price.required" => "Enter price",
            "author.required" => "Enter author",
            "category.required" => "Enter category",
        ];
    }
}
