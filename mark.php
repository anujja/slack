<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 26/08/16
 * Time: 5:38 PM
 */

require_once("includes/db.php");
require_once("includes/slack.php");

$todo = $_REQUEST["text"];
$channel = $_REQUEST["channel_id"];

$stmt = $conn->prepare("DELETE FROM todos WHERE todo = ? AND channel = ?");
$stmt->bind_param("ss", $todo, $channel);
$stmt->execute();

if ($stmt->affected_rows > 0)
    $message = "Removed TODO for \"" . $todo . "\".";
else
    $message = "Could not find that particular TODO.";

$stmt->close();
$conn->close();

sendMessageToSlackChannel($message);


