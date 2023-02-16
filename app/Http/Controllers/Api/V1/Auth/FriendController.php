<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RemoveFriendRequest;
use App\Http\Requests\CancelFriendRequest;
use \App\Http\Requests\RejectFriendRequest;
use App\Http\Requests\SendFriendRequest;
use App\Models\Friends;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Classes\Friendclass;

class FriendController extends Controller
{
    public function sendfriendRequest(SendFriendRequest $request)
    {
        $user = $request->user();
        $notFriend = User::notfriends($user->id);
        $friendId = User::where('pseudo_name', $request->pseudo_name)->first();
        $userFound = array_search($request->pseudo_name, $notFriend, 'true');
        if ($userFound === false) {
            return jsonFormat(false, ["can't be send"], "friend request already exist");
        }
        $data = [
            'user_id' => $user->id,
            'friendId' => $friendId->id,
            'isSend' => 1
        ];
        Friends::create($data);
        $data = [
            'user_id' => $friendId->id,
            'friendId' => $user->id,
            'isSend' => 0
        ];
        Friends::create($data);
        return jsonFormat(true, [], "Friend Request Sent");
    }

    public function acceptFriend(Request $request)
    {
        $currentUser = $request->user();
        $incomingrequest = User::incoming_request($currentUser->id);
        $friends = User::friends($currentUser->id);
        $friendFound = array_search($request->user_id, $friends);
        if ($friendFound !== false) {
            return jsonFormat(false, ["can't be accept"], "already friends");
        }
        $friendId = User::where('id', $request->user_id)->first();
        $userFound = array_search($request->user_id, $incomingrequest);
        if ($userFound === false) {
            return jsonFormat(false, ["can't be accept"], "friend request not found");
        }
        Friends::where('user_id', $currentUser->id)->where('friendId', $friendId->id)
            ->update([
                'status' => 1
            ]);
        Friends::where('friendId', $currentUser->id)->where('user_id', $friendId->id)
            ->update([
                'status' => 1
            ]);
        return jsonFormat(true, [], "friend request accepted");
    }

    public function cancelRequest(CancelFriendRequest $request)
    {
        $currentUser = $request->user()->id;
        $sentRequests = User::send_request($currentUser);
        $userFound = array_search($request->user_id, $sentRequests);
        $friendId = User::where('id', $request->user_id)->first();
        if ($userFound === false) {
            return jsonFormat(false, ["cannot cancel"], "Request Not Found");
        }
        Friends::where('user_id', $currentUser)->where('friendId', $friendId->id)->delete();
        Friends::where('friendId', $currentUser)->where('user_id', $friendId->id)->delete();
        return jsonFormat(true, [], "Request Cancelled");
    }

    public function declineFriend(RejectFriendRequest $request)
    {
        $currenUser = $request->user()->id;
        $incomingrequest = User::incoming_request($currenUser);
        $userFound = array_search($request->user_id, $incomingrequest);
        $friendId = User::where('id', $request->user_id)->first();
        if ($userFound === false) {
            return jsonFormat(false, ["can't be reject"], "friend request not found");
        }
        Friends::where('user_id', $currenUser)->where('friendId', $friendId->id)->delete();
        Friends::where('friendId', $currenUser)->where('user_id', $friendId->id)->delete();
        return jsonFormat(true, [], "you successfully Reject Friend request");
    }

    public function unFriend(RemoveFriendRequest $request)
    {
        $currentUser = $request->user()->id;
        $sentRequests = User::friends($currentUser);
        $userFound = array_search($request->user_id, $sentRequests);
        $friendId = User::where('id', $request->user_id)->first();
        if ($userFound === false) {
            return jsonFormat(false, ["can't remove"], "Friend Not Found");
        }
        Friends::where('user_id', $currentUser)->where('friendId', $friendId->id)->delete();
        Friends::where('friendId', $currentUser)->where('user_id', $friendId->id)->delete();
        return jsonFormat(true, [], "you successfully delete your friend");
    }

    public function friendList(Request $request)
    {
        $currentUser = $request->user()->id;
        if ($request->is_online == 1)
        {
            $data = Friendclass::onlineFriends($currentUser);
            return jsonFormat(true, $data, "Online friends");
        }
        elseif ($request->search_name)
        {
            $data = Friendclass::searchUser($request->search_name, $currentUser);
            return jsonFormat(true, $data, "Search Users");
        }
        elseif($request->friend_request == 'friend')
        {
            $data = Friendclass::friendRequests($currentUser);
            return jsonFormat(true, $data, "Friend requests");
        }
        elseif($request->all_users == 'users')
        {
            $data = Friendclass::allusers($currentUser);
            return jsonFormat(true, $data, "Friend requests");
        }
        else
        {
            $data = Friendclass::userFriends($currentUser);
            return jsonFormat(true, $data, "All friends");
        }
    }

}
