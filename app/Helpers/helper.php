<?php


use App\Models\Rooms;
use Faker\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Models\Etemplate;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Paymentlink;
use App\Models\Transactions;
use App\Models\Currency;
use App\Models\User;
use App\Models\Plans;
use App\Models\Subscribers;
use App\Models\Invoice;
use App\Models\Exttransfer;
use App\Models\Merchant;
use App\Models\Requests;
use App\Models\Transfer;
use App\Models\Withdraw;
use App\Models\Bank;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;



if(! function_exists('jsonFormat')){
    function jsonFormat($status,$data=array(),$message="",$statusCode=200){
        if($data && $message){
            if($status==false){
             return response()->json([
                    'status'    =>  $status,
                    'messages'  =>  $message,
                    'errors'  =>  $data
             ],$statusCode);
            }
             return response()->json([
                        'status'    =>  $status,
                        'messages'  =>  $message,
                        'data'  =>  $data
             ],$statusCode);
        }
        elseif($message){
            if($status==false){
             return response()->json([
                    'status'    =>  $status,
                    'messages'  =>  $message,
             ],$statusCode);
            }
             return response()->json([
                        'status'    =>  $status,
                        'messages'  =>  $message,
             ],$statusCode);
        }elseif($data){
            if($status==false){
             return response()->json([
                    'status'    =>  $status,
                    'errors'  =>  $data
             ],$statusCode);
            }
             return response()->json([
                        'status'    =>  $status,
                        'data'  =>  $data
             ],$statusCode);
        }
    }
}
if(! function_exists('jwtToken')){
    function jwtToken()
    {
        return "yFB5MKRQNoSHJreviwGomdNhmtLKNOydtrrEVirplUSCFuiOk8ReRYEy8qIOZsQm";
    }
}

 function user_object($user,$data)
{
    $data_user['id']            =   $user->id;
    $data_user['name']          =   $user->name;
    $data_user['email']         =   $user->email;
    $data_user['created_at']    =   date('Y-m-d H:i:s',strtotime($user->created_at));
    $data_user['facebook_id']   =   $user->facebook_id;
    $data_user['apple_id']      =   $user->apple_id;
    if (isset($data['access_token'])){
        $data_user['access_token']   =   $data['access_token'];
    }

    return $data_user;
}
