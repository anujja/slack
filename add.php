<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 26/08/16
 * Time: 5:38 PM
 */

require_once("includes/db.php");
require_once("includes/slack.php");

define("MAX_LENGTH", 1000);

$todo = $_REQUEST["text"];
$channel = $_REQUEST["channel_id"];

if (empty($todo))
    $message = "Nothing to do huh?";
else if (strlen($todo) > MAX_LENGTH)
    $message = "That is one long TODO. Maybe you should break it up? Preferably under " . MAX_LENGTH . " characters!";
else {
    $stmt = $conn->prepare("INSERT INTO todos (todo, channel) VALUES (?, ?)");
    $stmt->bind_param("ss", $todo, $channel);
    $stmt->execute();
    $stmt->close();
    $message = "Added TODO for \"" . $todo . "\".";
}
$conn->close();

sendMessageToSlackChannel($message);

