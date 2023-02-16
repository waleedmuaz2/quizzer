<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/** Auth **/
Route::group(['prefix'  =>  'v1/auth', 'namespace'=>'Api\V1\Auth'],function () {
	Route::post('login', 'LoginController@login');     /*Login User through Email*/
	Route::post('register', 'RegisterController@register');     /*Register User through Email*/
});

Route::group(['prefix'  =>  'v1','middleware'=>['jwt.verify'],'namespace' => 'Api\V1'],function () {
//    Route::post('race-help','CustomRoom\CustomRoomController@RaceHelps');
});
