<?php

error_reporting(E_ALL); ini_set('display_errors', 'On');
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
$conn = new mysqli($servername, $username, $password, $dbname);

$repairdb = new mysqli($servername, $rUser, $rPass, $rDb);
$freightdb = new mysqli($servername, $fUser, $fPass, $fDb);


// Check connection
if ($repairdb->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($freightdb->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>