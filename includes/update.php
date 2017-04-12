<?php

$freightID = stripInput($_GET["ticket"]);
$destination = stripInput($_POST["destination"]);
$consigment = stripInput($_POST["consignment"], 500);
$reference = stripInput($_POST["reference"]);
$contact = stripInput($_POST["contact"]);

$query="update freight set destination='$destination', consignment='$consigment', contact='$contact', reference='$reference' where freightID='$freightID'";

if ($freightdb->query($query) == TRUE) {
	require 'register.php';
}

?>