<?php
$tType = test_input($_POST["tType"]);
$tNumber = test_input($_POST["tNumber"]);
$destination = test_input($_POST["destination"]);
$consignment = test_input($_POST["consignment"], 500);
$reference = test_input($_POST["reference"]);
$ticket = strtoupper($tType)." ".$tNumber;
if(preg_match($validCleanTicket, $ticket)){
	$query = "INSERT INTO freight (freightTicket, destination, consignment, reference, contact, date) values ('$ticket', '$destination', '$consignment', '$reference', '$contact', '$date')";

	if ($freightdb->query($query) == TRUE) {
		$queryMethod = 'display';
		require 'register.php';
	} else {
		#			echo "Problem here boss:". $sql. "<br>". $conn->error;
	}
}else {
	echo "Ticket ".$ticket." Failed Validation";
}
?>