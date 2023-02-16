<?php

namespace Modules\Quiz\Rules;

use Illuminate\Contracts\Validation\Rule;

class CorrectAnswerRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $options=0;
        foreach ($value as $v){
            if(!isset($v['option']) || !isset($v['isCorrect'])){
                return false;
            }else{
                $options=($v['isCorrect']===false)?$options+0:$options+1;
            }
        }
        if($options==1){
            return true;
        }
        else{
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the answers option value is invalid.';
    }
}
