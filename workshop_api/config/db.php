<?php
$host = "localhost";
$username = "it67040233137";
$password = "D1G2W8A3";
$db = "it67040233137";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    die(json_encode([
        "status" => 500,
        "message" => "Database connection failed"
    ]));
}
?>