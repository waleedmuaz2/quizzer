<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationOtp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailVerificationController extends Controller
{
    public function VerifyOtp(Request $request){
        $user = User::where('email',$request->email)->first();
        $time = Carbon::now();
        $message = 'Invalid OTP';
        if ($time < $user->otp_expiry) {
            if ($request->otp == $user->verify_otp) {
                User::where('email',$request->email)->update(['email_verified_at'=>Carbon::now(),'verify_otp'=> null]);
                $message = 'Email Verify Successfully';
                return jsonFormat(true,"",$message);
            }
        }else {
            $message = 'OTP has been expired please retry';
        }
        return jsonFormat(false,"",$message);
    }
    public function ReSendOtp(Request $request){
        Mail::to($request->email)->send(new EmailVerificationOtp($request->email));
        return jsonFormat(true,"","OTP Resend Successfully");
    }
}
