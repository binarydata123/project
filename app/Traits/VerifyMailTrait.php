<?php

namespace App\Traits;
use \Mailjet\Resources;

trait VerifyMailTrait {

    public function verifyLawyerMail($toEmail, $subject) {
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
                            'Email' => $toEmail,
                            'Name' => "You"
                        ]
                    ],
                    'Subject' => $subject,
                    // 'TextPart' => "Greetings from Mailjet!",
                    'HTMLPart' => "<h3>You are successfully verified as a lawyer. Please login with you credentials</h3>
                    <br />Connect Legal"
                ]
            ]
        ];
        
        // All resources are located in the Resources class
        
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        return $response;
    }
    
}
