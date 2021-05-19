<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'username'=>'required|min:5',
            'password'=>'required|min:5'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Username is required!',
            'password.required' => 'Password is required!',
            'username.min:5' => 'Username must be minimun 5!',
            'password.min:5' => 'Password must be minimun 5!!',
        ];
    }
}
