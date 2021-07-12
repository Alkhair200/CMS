<?php
$host = "localhost:3308";
$username = "alkhair";
$password = "alkhair";
$db = "websitetest1";

$conn = new MySQLi($host, $username, $password ,$db);

if ($conn ->connect_error) {
    die ('No connection' . $conn->connect_error);

}