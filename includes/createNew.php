<?php

if(isset($_POST["tType"])){
	$carrier = 2;
}else{
	$carrier=1;
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
$reference = stripInput($_POST["reference"]);
$contact = stripInput($_POST["contact"]);




/*
 * TODO: Link Repair Ticket
 *
 * If(isRepair){
 * 		Link Repair Ticket
 * 			Confirm repair ticket exists
 * 			Create flag in a 'repairLink' column
 * 			generate a link to that repair
 * 			Create freightLink flag on the repair so that freight info appears on the repair docket.
 * 				Sort out how to handle multiple freight entries. Should the link be to the freight register or directly to track and trace?
 * 		$query = "SELECT from repairs where repairID is $reference";
 * 
 * 
 * }
 */

if($checkedTicket[1] != '0'){
	$query = "INSERT INTO freight (freightTicket, destination, consignment, reference, contact, date) values ('$ticket', '$destination', '$consignment', '$reference', '$contact', '$date')";
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