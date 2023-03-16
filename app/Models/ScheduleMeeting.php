<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleMeeting extends Model
{
    use HasFactory;

    public function getInviteeName($uri) {
        $parts = explode("/", $uri);
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.calendly.com/scheduled_events/".end($parts)."/invitees",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer eyJraWQiOiIxY2UxZTEzNjE3ZGNmNzY2YjNjZWJjY2Y4ZGM1YmFmYThhNjVlNjg0MDIzZjdjMzJiZTgzNDliMjM4MDEzNWI0IiwidHlwIjoiUEFUIiwiYWxnIjoiRVMyNTYifQ.eyJpc3MiOiJodHRwczovL2F1dGguY2FsZW5kbHkuY29tIiwiaWF0IjoxNjU5ODgxODc0LCJqdGkiOiJmNzhiMDRkNy1mZjg5LTQ4NWMtYmZjZC0xYTlhN2VjNTQ3ZDAiLCJ1c2VyX3V1aWQiOiIwZGJiN2EyMC01MGUwLTRkNTktOTQ4NS0wOGQ5NGFkYTE0ZTQifQ.9uIsvSLX2ffOBSKInfc-R_K4NTPUcXe-UdEj37DptpNNtMaaQCRQZsCVJRrQXpftWZaSnmYwtJCJgINnyAJarg",
            "Content-Type: application/json"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $data = [];
            $response = json_decode($response)->collection[0];
            $data['email'] = $response->email;
            $data['name'] = $response->name;

            return $data;
        }
    }
}
