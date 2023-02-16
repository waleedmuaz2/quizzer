<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Mailable
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
        $r_number = mt_rand(11111, 99999);
        User::where('email',$this->email)->update([
            'security_code'=>$r_number,
            'password'=>Hash::make($r_number)
        ]);
        return $this->to($this->email)
            ->view('emails.auth.reset_password',['r_number'=>$r_number]);
    }
}
