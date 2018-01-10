<?php

if(isset($_POST["tType"])){
	$carrier = 1;
}else{
	$carrier=2;
}


switch($carrier){
	case 1:
		$tType = stripInput($_POST["tType"]);
		$tNumber = stripInput($_POST["tNumber"]);
		$ticket = strtoupper($tType)." ".$tNumber;
		break;
	case 2:
		$ticket = stripInput($_POST["tNumber"]);
		break;
}

$checkedTicket = ticketTest($ticket);
$destination = stripInput($_POST["destination"]);
$consignment = stripInput($_POST["consignment"], 500);
//$isRepair = stripInput($_POST["repairCheck"]);
$reference = stripInput($_POST["reference"]);
$contact = stripInput($_POST["contact"]);



if($checkedTicket[1] != '0'){
	$query = "INSERT INTO freight (freightTicket, destination, consignment, reference, contact, date) values ('$checkedTicket[0]', '$destination', '$consignment', '$reference', '$contact', '$date')";
	echo 'Success';
	if ($freightdb->query($query) == TRUE) {
		$queryMethod = 'display';
			require 'includes/register.php';
		
		
		
	} else {
		#			echo "Problem here boss:". $sql. "<br>". $conn->error;
	}
}else {
	echo "Ticket ".$ticket." Failed Validation";
}
?>
