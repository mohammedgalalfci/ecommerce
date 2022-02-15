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
            'status'=> 'in:waiting,completed',
            'store_id'=> 'required|exists:stores,id',
            'user_id'=> 'required|exists:users,id',
        ];
    }
}
