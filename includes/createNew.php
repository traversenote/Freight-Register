<?php
$tType = test_input($_POST["tType"]);
$tNumber = test_input($_POST["tNumber"]);
$destination = test_input($_POST["destination"]);
$consignment = test_input($_POST["consignment"], 500);
$reference = test_input($_POST["reference"]);
$ticket = strtoupper($tType)." ".$tNumber;
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

if(preg_match($validCleanTicket, $ticket)){
	$query = "INSERT INTO freight (freightTicket, destination, consignment, reference, contact, date) values ('$ticket', '$destination', '$consignment', '$reference', '$contact', '$date')";
	echo 'doing the thing';
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