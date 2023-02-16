<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Classes\Friendclass;
use App\Classes\Userclass;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Avatar;
use App\Models\CoinWallets;
use App\Models\Sales;
use App\Models\User;
use App\Models\UserAvatar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\UpdatePseudoNameAndDescriptionRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\SelectAvatarRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updatePassword(UpdateUserPasswordRequest $request){
        $currentUser = $request->user();
        $password = $request->password;
         User::where('id', $currentUser->id)->update([
             'password'=> Hash::make($password)
         ]);
        return jsonFormat(true, [], "Password updated");
    }
    public function deleteAccount(DeleteUserRequest $request){
//        $currentUser = $request->user();
//        $password = $request->password;
//        if(Hash::check($password, $currentUser->password)){
//            User::where('id', $currentUser->id)->delete();
//        }
        return jsonFormat(true, [], "Account deleted");
    }
    public function getAvatar(Request $request){
       // $avatar= Avatar::where('status',1)->get();
         $data['avatar'] = Avatar::where('status',1)->get();
            $offer_avatars = Sales::where('user_id',$request->user()->id)->where('model','offer')->get();
            $my_avatars = [];
            foreach ($offer_avatars as $offer_avatar){
                $p_avatar = json_decode( $offer_avatar->offer_json);
                $user_avatar = asset('offers/'.$p_avatar->user_avatar);
                $my_avatars[]= ['user_avatar' => $user_avatar];

            }
            $data['my_avatars'] = $my_avatars;
        return jsonFormat(true, $data, "avatar");
    }
    public function selectAvatar(SelectAvatarRequest $request){
        $currentUser = $request->user();
        $avatar = $request->avatar;
        $model="BuyAvatar";
        $avatarExist = UserAvatar::where('user_id',$currentUser->id)->where('avatar_id',$avatar)->first();

        $paidAvatar  = Avatar::where('id', $avatar)->where('is_paid', 1)->first();

        if(!$avatarExist) {
            if ($paidAvatar) {
                $balance = CoinWallets::where('user_id', $currentUser->id)->orderby('id', 'desc')->first();
                if (!isset($balance->balance) || (isset($balance->balance) && $balance->balance < $paidAvatar->amount)) {
                    return Userclass::insufficientBalance();
                }
                Userclass::balance($currentUser->id, $paidAvatar->amount, $model, "debit");
            }
        }
        if($avatarExist){
                UserAvatar::where('user_id',$currentUser->id)->update([
                    'status'=>'0'
                ]);
                UserAvatar::where('user_id',$currentUser->id)->where('avatar_id',$avatar)->update([
                    'status'=>'1'
                ]);
            }
            else{
                UserAvatar::where('user_id',$currentUser->id)->update([
                    'status'=>'0'
                ]);
                UserAvatar::create([
                    'user_id' => $currentUser->id,
                    'avatar_id' => $avatar,
                    'status' => '1'
                ]);
        }
        return jsonFormat(true, [], "Avatar selected");
    }
    public function searchUsers(Request $request){
         $pesudo_name = $request->pesudo_name;
         $data =  Friendclass::searchUser($pesudo_name);
         return jsonFormat(true,[], $data);
    }
}
