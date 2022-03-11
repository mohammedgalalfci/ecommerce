<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'=>['required', 'min:3', 'max:255'],
            'description'=>['required', 'min:10', 'max:255'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'=>['required','numeric'],
            'discount'=>'required|numeric',
            'subcat_id' => 'required|exists:subcategories,id',
            'cat_id' => 'required|exists:categories,id',

        ];
    }
}
