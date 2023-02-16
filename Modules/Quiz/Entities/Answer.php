<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $table="answers";
    protected $fillable = ['questionId','option'];

    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\QuizFactory::new();
    }
    public function correctAnswer(){
        return $this->hasOne(CorrectAnswer::class,'answerId','id')->withDefault([
            'answerId' => false,
        ]);
    }
}
