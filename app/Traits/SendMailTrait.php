<?php

namespace App\Traits;
use \Mailjet\Resources;
use Illuminate\Support\Facades\View;

trait SendMailTrait {

    public function sendEmail($toEmail, $subject) {
        $apikey = env('MJ_APIKEY_PUBLIC');
        $apisecret = env('MJ_APIKEY_PRIVATE');
        $html = View::make('emails.lawyer-registered', ['email' =>  $request->email, 'name' => $request->name, 'token' => $token])->render();
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
                            'Email' => $toEmail,
                            'Name' => "You"
                        ]
                    ],
                    'Subject' => $subject,
                    // 'TextPart' => "Greetings from Mailjet!",
                    'HTMLPart' => "<h3>You have successfully registered to the Connect Legal website. Will let you know once we verify you to login!</h3>
                    <br />Connect Legal"
                ]
            ]
        ];
        
        // All resources are located in the Resources class
        
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        return $response;
    }
    
}
