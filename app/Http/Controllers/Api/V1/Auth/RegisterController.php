<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request){
        $data=[
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
        ];
        $user = User::create($data);
        $user =  $user->refresh();
        $token = JWTAuth::fromUser($user);
        $data=[
            'user'=>User::userObj($user),
            'token'=>$token
        ];
        $message="user register successfully";
        return jsonFormat(true,$data,$message);
    }
}
