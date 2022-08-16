<?php

namespace App\Services;

use App\Http\Resources\Mobile\NotificationResource;

class NotificationService
{

    function sendNotification($user, $notification)
    {
        $SERVER_API_KEY = 'AAAAds:APA91bG56NeL1Ey8gNEu3P-EDfFMQSx1Cf1jA2ADM0ysITD8jERgFcQF6JT7Hz_BRE8sJTkye4glGUNoS1YpoAG9XcpibB13A3JeDNOILnHBoWDdaiOSOxhaYVpUGkuWsNrtuKb48Jnh';

        if ($user->fcm_token != null) {
            $data = [

                "registration_ids" => [
                    $user->fcm_token
                ],

                "data" => new NotificationResource($notification)

            ];

            $dataString = json_encode($data);
            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            $response = curl_exec($ch);
        }
    }
}
