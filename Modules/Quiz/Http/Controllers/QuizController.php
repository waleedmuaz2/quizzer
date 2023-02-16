<?php

namespace Modules\Quiz\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Entities\Answer;
use Modules\Quiz\Entities\CorrectAnswer;
use Modules\Quiz\Entities\Question;
use Modules\Quiz\Entities\Quiz;
use Modules\Quiz\Http\Requests\StoreQuiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        $quizzes = Quiz::with('questions.answers.correctAnswer')->get();
        return jsonFormat(true,$quizzes,"quiz",200);
    }

    /**
     * Show the form for creating a new resource.
     * @param StoreQuiz $request
     * @return JsonResponse
     */
    public function create(StoreQuiz $request)
    {

        $quiz = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        $quizObject = Quiz::create($quiz);
        foreach ($request->questions as $question){
            $questionArray=[
                'quizId'=>$quizObject->id,
                'description'=>$question['description'],
                'isRequired'=>$question['isMandatory'],
            ];
            $questionObject = Question::create($questionArray);
            foreach ($question['answers'] as $answer){
                $answerArray=[
                    'questionId'=>$questionObject->id,
                    'option'=>$answer['option']
                ];
                $answerObject = Answer::create($answerArray);
                if($answer['isCorrect']==true){
                    $correctAnswer=[
                        'questionId'=>$questionObject->id,
                        'answerId'=>$answerObject->id
                    ];
                    CorrectAnswer::create($correctAnswer);
                }
            }
        }
        return jsonFormat(true,[],"quiz updated successfully",200);

    }
}
