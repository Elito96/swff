<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function sendNotification(Request $request){
        $title = 'dfasdfasdf';
        $body = 'Hola Juvenal';

        $tokens = DB::table('users')->where('id', '=', 24)->pluck('token');

        $notification = array(
            "title" => $title,
            "body" => $body
        );

        $message = array("message" => "Message from serve", "customKey" => "customValue");

        $url = "https://fcm.googleapis.com/fcm/send ";
        $fields = array(
            "registration_ids" => $tokens,
            "notification" => $notification,
            "data" => $message
        );
        $header = array(
            'Content-Type: application/json',
            'Authorization: key=AAAAFAPR0Oc:APA91bG-erQyGsb14ITv8WifHVv3tiVUMdP7w__9JAZ4DsCkMeNw_5qIIrM6iVS8yvqm5GEeiOjA5rIAECbGy9fmI4vWcT1vSel9RXDhWbgTxhJPCoVtYT-aCQDcFJhVY2ZQybC9xOff'
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        if($result == false){
            die('Curl failed : ' . curl_error($ch));
        } else {
            echo 'envio con exito';
        }
        curl_close($ch);
    }
}
