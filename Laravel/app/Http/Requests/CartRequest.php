<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'total_price'=>['required','numeric'],
            'products_number'=>['required','numeric'],
            'store_id'=> 'required|exists:stores,id',
            'customer_id'=> 'required|exists:customers,id',
        ];
    }
}
