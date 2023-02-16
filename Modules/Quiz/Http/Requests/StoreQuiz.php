<?php

namespace Modules\Quiz\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Quiz\Rules\CorrectAnswerRule;

class StoreQuiz extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:2|max:20',
            'description'=>'required|min:2|max:50',

            'questions'=>'required|array',
            'questions.*.description'=>'required|min:2|max:20',
            'questions.*.isMandatory'=>'required|boolean',

            'questions.*.answers'=>[
                'required',
                new CorrectAnswerRule()
            ]

        ];
    }

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
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        foreach ($validator->messages()->getMessages() as $key =>   $message){
            $messages[$key]     =   $message[0];
        }
        $response = jsonFormat(false,$messages,"The given data was invalid.",422);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
