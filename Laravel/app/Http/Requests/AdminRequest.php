<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AdminRequest extends FormRequest
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
            'admin_name'=>['required', 'min:3', 'max:25'],
            'admin_email'=>['required','email', Rule::unique('admins','admin_email')->ignore($this->admin)],
            'password'=>['required', 'min:6'],
        ];
    }

}
