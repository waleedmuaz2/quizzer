<?php

namespace App\Mail;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationOtp extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $verify_otp = mt_rand(11111, 99999);
        $expiry_time = Carbon::now()->addMinutes(2);
        User::where('email',$this->email)->update(['verify_otp'=>$verify_otp,'otp_expiry'=>$expiry_time]);
        return $this->from(config('mail.from.address'))->subject("Email Verification Address")
            ->view('emails.email-verification-otp',['otp'=>$verify_otp]);
    }
}
