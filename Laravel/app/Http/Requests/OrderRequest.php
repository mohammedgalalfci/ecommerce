<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'order_number'=>['required',Rule::unique('orders','order_number')->ignore($this->order)],
            'name'=>['required', 'min:3', 'max:25'],
            'discount'=>['numeric'],
            'price'=>['required','numeric'],
            'quantity'=>['required','numeric'],
            'country'=>['required'],
            'city'=>['required'],
            'phone'=>['required','min:11','max:11','regex:/(01)[0-9]{9}/'],
            'customer_id'=> 'required|exists:customers,id',
            'cart_id'=> 'required|exists:carts,id',
        ];
    }
}
