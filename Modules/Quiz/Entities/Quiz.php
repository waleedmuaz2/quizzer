<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $table="quizzes";
    protected $fillable = ['title','description','status'];

    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\QuizFactory::new();
    }
    public function questions(){
        return $this->hasMany(Question::class,'quizId','id');
    }

}
