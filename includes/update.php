<?php

$freightID = test_input($_GET["ticket"]);
$destination = test_input($_POST["destination"]);
$consigment = test_input($_POST["consignment"], 500);
$reference = test_input($_POST["reference"]);
$contact = test_input($_POST["contact"]);

$query="update freight set destination='$destination', consignment='$consigment', contact='$contact', reference='$reference' where freightID='$freightID'";

if ($freightdb->query($query) == TRUE) {
	require 'register.php';
}

?>