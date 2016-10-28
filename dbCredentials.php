<?php
// Credentials for connecting to the Database
$servername = "localhost";
$username = "testuser";
$password = "password";
$dbname = "test";

$servername = "localhost";
$rUser = 'testuser';
$rPass = 'password';
$rDb = 'test';

$fUser = 'testuser';
$fPass = 'password';
$fDb = 'test';


// Create connection
#$conn = new mysqli($servername, $username, $password, $dbname);

$repairdb = new mysqli($server, $rUser, $rPass, $rDb);
$freightdb = new mysqli($server, $fUser, $fPass, $fDb);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>