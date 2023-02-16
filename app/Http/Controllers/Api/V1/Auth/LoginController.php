<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\CountryUpdateRequest;
use App\Http\Requests\DeleteProfileRequest;
use App\Http\Requests\GuestProfileUpdateRequest;
use App\Http\Requests\LoginWithAppleRequest;
use App\Http\Requests\LoginWithEmailRequest;
use App\Http\Requests\LoginWithFacebookRequest;
use App\Http\Requests\LoginWithGoogleRequest;
use App\Http\Requests\RegisterWithEmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SocailLoginRequest;
use App\Mail\ResetPassword;
use App\Models\Countries;
use App\Models\ModelHasRole;
use App\Models\OauthAccessToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\UpdatePseudoNameAndDescriptionRequest;
use App\Helper\helper;


class LoginController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request){
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            $data=(object)["email"=>"Incorrect Credentials"];
            return jsonFormat(false,$data,"The given data was invalid.",401);
        }
        $user =User::where('email',$request->email)->first();
        $data['user']=User::userObj($user);
        $data['token']=$jwt_token;
        return jsonFormat(true,$data,"Login Successfully");
    }
}
