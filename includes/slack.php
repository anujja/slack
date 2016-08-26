<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 26/08/16
 * Time: 7:19 PM
 */

function sendMessageToSlackChannel($message) {

    $data = array("response_type" => "in_channel", "text" => $message);
    header('Content-Type: application/json');
    echo json_encode($data);

}
