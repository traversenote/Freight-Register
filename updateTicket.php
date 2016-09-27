<?php
$freightID = test_input($_GET["ticket"]);
$destination = test_input($_POST["destination"]);
$consigment = test_input($_POST["consignment"]);
$contact = test_input($_POST["contact"]);

$query="update freight set destination='$destination', consignment='$consigment', contact='$contact' where freightID='$freightID'";

if ($conn->query($query) == TRUE) {
	require 'register.php';
}
?>