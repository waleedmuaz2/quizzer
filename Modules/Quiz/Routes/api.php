<?php

use Illuminate\Http\Request;
use Modules\Quiz\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'  =>  'v1/quiz','middleware'=>['jwt.verify']],function () {
    Route::get('/', 'QuizController@index');
    Route::post('/', 'QuizController@create');
});
