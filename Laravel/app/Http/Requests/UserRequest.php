<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserRequest extends FormRequest
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
            // 'email'=>['required','email', Rule::unique('admins','admin_email')->ignore($this->admin)],
            'email'=>['required','email', Rule::unique('users','email')->ignore($this->user)],
            'password'=>['required', 'min:6'],
            'full_address'=>['required', 'max:100'],
            'house_no'=>['required', 'numeric'],
            'country'=>['required'],
            'city'=>['required'],
            'phone'=>['required','min:11','max:11','regex:/01[0125][0-9]{8}/'],
        ];
    }
}
