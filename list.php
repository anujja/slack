<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 26/08/16
 * Time: 7:03 PM
 */

require_once("includes/db.php");
require_once("includes/slack.php");

$channel = $_REQUEST["channel_id"];

$stmt = $conn->prepare("SELECT todo FROM todos WHERE channel = ?");
$stmt->bind_param("s", $channel);
$stmt->execute();
$stmt->store_result();

$output = "";
if ($stmt->num_rows > 0) {
    // output data of each row
    $stmt->bind_result($todo);
    while($stmt->fetch()) {
        $output = $output . "-  " . $todo . "\n";
    }
} else {
    $output = "No TODOs.";
}

$stmt->close();
$conn->close();

sendMessageToSlackChannel($output);

