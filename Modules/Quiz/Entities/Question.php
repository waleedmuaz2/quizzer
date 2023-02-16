<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $table="questions";
    protected $fillable = ['quizId','description','isRequired'];

    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\QuizFactory::new();
    }
    public function answers(){
        return $this->hasMany(Answer::class,'questionId','id');
    }
}
