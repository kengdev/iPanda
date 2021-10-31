<?php

$access_token = 'EABDpq01cuYMBANUycT4UYnYDVaqxLpZBlmjeR46MDdEGQb2laU8ZBXMX6aRgv7bj6NBRiyPoXP0nGzaKPotBZAw77VCCGkGim8QXhPHYnw6bDgQHZB5ZCa7SRUaGdTZAb8k36b1Aad5L3PWX2zvo5qtwBkehd6pJ4JY6NHcucvkQAN9BHJmegvf4hBmPntjJF8qi0HNUS1kwZDZD';

/* validate verify token needed for setting up web hook */ 

if (isset($_GET['hub_verify_token'])) { 
    if ($_GET['hub_verify_token'] === $access_token) {
        echo $_GET['hub_challenge'];
        return;
    } else {
        echo 'Invalid Verify Token';
        return;
    }
}

/* receive and send messages */
$input = json_decode(file_get_contents('php://input'), true);

//if (isset($input['entry'][0]['messaging'][0]['sender']['id'])) {

    $sender = $input['entry'][0]['messaging'][0]['sender']['id']; //sender facebook id 

    $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='. $access_token;

    /*initialize curl*/
    $ch = curl_init($url);

    /*prepare response*/
    $message = 'What sup man'.' '.$sender;

    $resp = array(
      'recipient' => array(
        'id' => '4466510196728031'
      ),
      'message' => array(
        'text' => $message
      )
    );
    $jsonData = json_encode($resp);

    /* curl setting to send a json post data */
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $result = curl_exec($ch); // user will get the message
//}
