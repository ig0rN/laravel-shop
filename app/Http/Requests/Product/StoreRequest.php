<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'article_code' => 'required|unique:products,article_code|min:5',
            'name' => 'required|min:3',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required|min:3',
            'image' => 'required|mimes:jpeg,jpg,png|max:1024'
        ];
    }
}
