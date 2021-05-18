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
            'users' => 'required',
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        
        $messages = $validator->messages();
        dd($messages);
        foreach ($messages->all() as $message)
        {
            toastr()->error($message, 'Failed', ['timeOut' => 10000]);
        }

        return $validator->errors()->all();
    }
}
