<?php
    namespace App\Traits;

use App\Models\SchduledMeeting;
use App\Models\Zoom;
use GuzzleHttp\Client;
    use Log;

    trait ZoomMeetingTrait
    {
        public $client;
        public $jwt;
        public $headers;

        public function __construct() {
            $this->client = new Client();
            $this->jwt = $this->generateZoomToken();
            $this->headers = [
                'Authorization' => 'Bearer '.$this->jwt,
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ];
        }

        public function generateZoomToken() {
            $key = env('ZOOM_API_KEY', '');
            $secret = env('ZOOM_API_SECRET', '');
            $payload = [
                'iss' => $key,
                'exp' => strtotime('+1 minute'),
            ];

            return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
        }

        private function retrieveZoomUrl() {
            return env('ZOOM_API_URL', '');
        }

        public function toZoomTimeFormat(string $dateTime) {
            try {
                $date = new \DateTime($dateTime);
                // dd($date->format('Y-m-d\TH:i:s'));
                return $date->format('Y-m-d\TH:i:s');
            } catch (\Exception $e) {
                Log::error('ZoomJWT->toZoomTimeFormat : '.$e->getMessage());

                return '';
            }
        }

        public function create($data) {            
            // dd($dateInLocal);
            $path = 'users/me/meetings';
            $url = $this->retrieveZoomUrl();

            $body = [
                'headers' => $this->headers,
                'body'    => json_encode([
                    'topic'      => $data['topic'],
                    'type'       => self::MEETING_TYPE_SCHEDULE,
                    'start_time' => $data['start_time'],
                    'duration'   => $data['duration'],
                    'agenda'     => (! empty($data['agenda'])) ? $data['agenda'] : null,
                    'timezone'   => 'Asia/Calcutta',
                    'settings'   => [
                        'host_video'        => ($data['host_video'] == "1") ? true : false,
                        'participant_video' => ($data['participant_video'] == "1") ? true : false,
                        'waiting_room'      => true,
                        'meeting_invitees' => [
                            [
                                "email" => $data['email'],
                            ],
                            [
                                "email" => auth()->user()->email,
                            ]
                        ],
                        "registrants_confirmation_email" => true,
                        "calendar_type" => 2,
                        "email_notification" => true,
                    ],
                ]),
            ];

            $response =  $this->client->post($url.$path, $body);
            $bodyData = json_decode($response->getBody(), true);
            // dd($bodyData);
            $zoom = Zoom::create([
                'uuid' => $bodyData['uuid'],
                'days_slot_id' => $data['daySlotId'],
                'payment_id' => $data['paymentId'],
                'topic' => $data['topic'],
                'start_date_time' => $data['start_time'],
                'end_date_time' => $data['end_time'],
                'duration' => $data['duration'],
                'agenda' => $data['agenda'],
                'start_url' => $bodyData['start_url'],
                'join_url' => $bodyData['join_url'],
                'password' => $bodyData['password'],
            ]);

            SchduledMeeting::updateOrCreate(['id' => $data['paymentId']],
            ['zoom_id' => $zoom->id]);
            
            $startTime = new \DateTime($data['start_time']);
            $mail_data = [
                'subject' => "Meeting scheduled",
                'htmlPart' => "Meeting link: ". $bodyData['join_url']. " Starts at: ".$startTime->format('Y-m-d H:i:s'). ' duration: '.$data['duration'].', agenda: '.$data['agenda'],
                'emails' => [$zoom->payment->scheduledBy->email, $zoom->payment->lawyer->email],
            ];

            $job = (new \App\Jobs\ScheduledMeetingEmail($mail_data))
                    ->delay(now()->addSeconds(2)); 
    
            dispatch($job);

            return [
                'success' => $response->getStatusCode() === 201,
                'data'    => json_decode($response->getBody(), true),
            ];
        }

        public function update($id, $data)
        {
            $path = 'meetings/'.$id;
            $url = $this->retrieveZoomUrl();

            $body = [
                'headers' => $this->headers,
                'body'    => json_encode([
                    'topic'      => $data['topic'],
                    'type'       => self::MEETING_TYPE_SCHEDULE,
                    'start_time' => $this->toZoomTimeFormat($data['start_time']),
                    'duration'   => $data['duration'],
                    'agenda'     => (! empty($data['agenda'])) ? $data['agenda'] : null,
                    'timezone'     => 'Asia/Kolkata',
                    'settings'   => [
                        'host_video'        => ($data['host_video'] == "1") ? true : false,
                        'participant_video' => ($data['participant_video'] == "1") ? true : false,
                        'waiting_room'      => true,
                    ],
                ]),
            ];
            $response =  $this->client->patch($url.$path, $body);

            return [
                'success' => $response->getStatusCode() === 204,
                'data'    => json_decode($response->getBody(), true),
            ];
        }

        public function get($id)
        {
            $path = 'meetings/'.$id;
            $url = $this->retrieveZoomUrl();
            $this->jwt = $this->generateZoomToken();
            $body = [
                'headers' => $this->headers,
                'body'    => json_encode([]),
            ];

            $response =  $this->client->get($url.$path, $body);

            return [
                'success' => $response->getStatusCode() === 204,
                'data'    => json_decode($response->getBody(), true),
            ];
        }

        /**
         * @param string $id
         * 
         * @return bool[]
         */
        public function delete($id)
        {
            $path = 'meetings/'.$id;
            $url = $this->retrieveZoomUrl();
            $body = [
                'headers' => $this->headers,
                'body'    => json_encode([]),
            ];

            $response =  $this->client->delete($url.$path, $body);

            return [
                'success' => $response->getStatusCode() === 204,
            ];
        }
    }