<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SubcategoryRequest extends FormRequest
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
            'subcat_name' => ['required',Rule::unique('subcategories')->where('cat_id', $this->cat_id)],
            'cat_id' => 'required|exists:categories,id',

        ];
    }
    public function messages()
{
    return [
    ];

}

}
