<?php

namespace App\Jobs;

use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mailjet\Resources;

class SendReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $mail_data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_data) {
        $this->mail_data = $mail_data;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subject = $this->mail_data['subject'];
        $message = $this->mail_data['htmlPart'];
        $userEmail = $this->mail_data['user'];
        $user = User::whereEmail($userEmail)->first();
        
        $apikey = env('MJ_APIKEY_PUBLIC');
        $apisecret = env('MJ_APIKEY_PRIVATE');

        $mj = new \Mailjet\Client($apikey, $apisecret,true,['version' => 'v3.1']);

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "s4shamma@gmail.com",
                        'Name' => "Connect Legal"
                    ],
                    'To' => [
                        [
                            'Email' => $userEmail,
                            'Name' => $user->name
                        ]
                    ],
                    'Subject' => $subject,
                    // 'TextPart' => "Greetings from Mailjet!",
                    'HTMLPart' => $message
                ]
            ]
        ];
        
        $mj->post(Resources::$Email, ['body' => $body]);
    }
}
