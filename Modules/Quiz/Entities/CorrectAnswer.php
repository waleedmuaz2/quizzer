<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CorrectAnswer extends Model
{
    use HasFactory;

    protected $table="correct_answers";
    protected $fillable = ['questionId','answerId'];

    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\QuizFactory::new();
    }
}
