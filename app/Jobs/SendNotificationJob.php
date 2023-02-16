<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Kutia\Larafirebase\Facades\Larafirebase;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details=$details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $count = User::count();
        if ($count > 0){
            $total_pages=$count / 100;

            for ($page_num=0; $page_num<$total_pages; $page_num++){
                $offset = ($page_num-1) * 100;

                $users = User::whereNotNull('fcm_token')
                    ->offset($offset)
                    ->limit(100)
                    ->get();

                Log::info('page= '.$page_num);

                if (count($users)){
                    $fcm_tokens=$users->pluck('fcm_token')->toArray();

                    Larafirebase::withTitle($this->details['title'])
                        ->withBody($this->details['message'])
                        //->withSound('default')
                        ->withPriority('high')
                        ->sendNotification($fcm_tokens);
                }
            }

            $notification=new Notification();
            $notification->user_id=$this->details['user_id'];
            $notification->title=$this->details['title'];
            $notification->message=$this->details['message'];
            $notification->save();
        }
    }
}
