<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='freightRegister.css' />
<title>Freight Codes</title>
</head>

<body>
<?php
include 'dbCredentials.php';
include 'functions.php';

$date = date("Y-m-d");
$allowNew="no";
$validTicketFormat='/[0-9][A-Z]{5,6}\ +[0-9]{10}/';
$validCleanTicket='/[A-Z]{2,3}\ +[0-9]{10}/';


if(isset($_GET['source'])){
	switch($_GET['source']){
		case 'shopPhone':
			$allowNew="yes";
			break;
		default:
			$allowNew="no";
	}
}

if(isset($_GET["source"]) && isset($_GET["ticket"]) && $allowNew == "yes"){
	$ticket = test_input($_GET["ticket"]);
	if(!preg_match($validTicketFormat, $ticket)){
		echo $ticket;
	}else{
		$ticket = substr($ticket, 4, 17);

		$query = "SELECT * from freight where freightTicket='$ticket'";
		$result = $conn->query($query);
		if($result->num_rows >= 1 ){
			while($row = $result->fetch_assoc()) { $duplicate = $row["freightID"]; }
			echo "The Freight Ticket ".$ticket." appears to exist already: <a href=ticket.php?ticket=".$duplicate."> See here </a>";
		}else{
			$query = "insert into freight (freightTicket, destination, consignment, contact, date) values ('$ticket', 'Destination', 'Consignment', 'Contact', '$date')";
			if ($conn->query($query) == TRUE) {
				#		echo $ticket." Logged Successfully.<br>Or click <a href='ticket.php?ticket='".$ticket."'>here to edit this record</a>";
				echo $ticket." Logged Successfully.<br>";
			} else {
				echo "Problem here boss:". $sql. "<br>". $conn->error;
			}
		}
	}
}elseif ($_GET["action"]== "update"){
	$freightID = test_input($_GET["ticket"]);
	$destination = test_input($_POST["destination"]);
	$consigment = test_input($_POST["consignment"]);
	$reference = test_input($_POST["reference"]);
	$contact = test_input($_POST["contact"]);
	
	$query="update freight set destination='$destination', consignment='$consigment', contact='$contact', reference='$reference' where freightID='$freightID'";

	if ($conn->query($query) == TRUE) {
		require 'register.php';
	}	
}elseif ($_GET["action"] == "createNew"){
	$tType = test_input($_POST["tType"]);
	$tNumber = test_input($_POST["tNumber"]);
	$destination = test_input($_POST["destination"]);
	$consignment = test_input($_POST["consignment"]);
	$reference = test_input($_POST["reference"]);
	$ticket = strtoupper($tType)." ".$tNumber;
	if(preg_match($validCleanTicket, $ticket)){
		$query = "INSERT INTO freight (freightTicket, destination, consignment, reference, contact, date) values ('$ticket', '$destination', '$consignment', '$reference', $contact', '$date')";
		
		if ($conn->query($query) == TRUE) {
			$queryMethod = 'display';
			require 'register.php';
		} else {
#			echo "Problem here boss:". $sql. "<br>". $conn->error;
		}
	}else { 
		echo "Ticket ".$ticket." Failed Validation";
	}
}else{
	
	$queryMethod = 'display';
	require 'register.php';

}

?>
</body>
</html>