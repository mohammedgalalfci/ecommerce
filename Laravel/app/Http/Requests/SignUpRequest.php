<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name'=>['required', 'min:3', 'max:25'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:6'],
            'full_address'=>['required','max:100'],
            'house_no'=>['required'],
            'country'=>['required'],
            'city'=>['required'],
            'phone'=>['required','min:11', 'max:11'],
        ];
    }
}
