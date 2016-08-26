<?php
/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 26/08/16
 * Time: 5:29 PM
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = "localhost";
$user = "slack";
$password = "d84dn83hdbWW";
$db = "slack";

$conn = new mysqli($server, $user, $password, $db);

// check connection
if ($conn->connect_error) {
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

