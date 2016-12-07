<?php
$freightID = stripInput($_GET["ticket"]);
$destination = stripInput($_POST["destination"]);
$consigment = stripInput($_POST["consignment"]);
$contact = stripInput($_POST["contact"]);

$query="update freight set destination='$destination', consignment='$consigment', contact='$contact' where freightID='$freightID'";

if ($conn->query($query) == TRUE) {
	require 'register.php';
}
?>