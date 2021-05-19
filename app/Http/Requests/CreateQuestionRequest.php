<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
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
            'test_name' => 'required',
            'users' => 'array|min:1',
            'users.*.question' => 'required',
            'users.*.option1' => 'required',
            'users.*.option2' => 'required',
            'users.*.option3' => 'required',
            'users.*.option4' => 'required',
            'users.*.check' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'test_name.required' => 'Test name is required!',
            'users' => 'array|min:1',
            'users.*.question.required' => 'Question is required!',
            'users.*.option1.required' => 'Option A is required!',
            'users.*.option2.required' => 'Option B is required!',
            'users.*.option3.required' => 'Option C is required!',
            'users.*.option4.required' => 'Option D is required!',
            'users.*.check.required' => 'Answer is required!',
        ];
    }
}
