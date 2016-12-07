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
$validTicketFormat='/[0-9][A-Z]{5,6}\ +[0-9]{10}/';
$validCleanTicket='/[A-Z]{2,3}\ +[0-9]{8}/';

/*
if(isset($_GET['source'])){
	switch($_GET['source']){
		case 'shopPhone':
			$allowNew="yes";
			break;
		default:
			$allowNew="no";
	}
}
*/

if(isset($_GET["action"])){
	switch($_GET["action"]){
		case 'update':
			#require update.php
			break;
		case 'createNew':
			#require createNew.php
			break;
		default:
			#simply display
	}
	
}


if(isset($_GET["source"]) && isset($_GET["ticket"])){
	$ticket = stripInput($_GET["ticket"]);
	$source = stripInput($_GET["source"]);
	if(!preg_match($validTicketFormat, $ticket)){
		echo $ticket;
	}else{
		$ticket = substr($ticket, 4, 12);

		$query = "SELECT * from freight where freightTicket='$ticket'";
		$result = $conn->query($query);
		if($result->num_rows >= 1 ){
			while($row = $result->fetch_assoc()) { $duplicate = $row["freightID"]; }
			echo "The Freight Ticket ".$ticket." appears to exist already: <a href=ticket.php?ticket=".$duplicate."> See here </a>";
		}else{
			require 'mobile.php';
		}
	}
}elseif ($_GET["action"]== "update"){
	$freightID = stripInput($_GET["ticket"]);
	$destination = stripInput($_POST["destination"]);
	$consigment = stripInput($_POST["consignment"]);
	$reference = stripInput($_POST["reference"]);
	$contact = stripInput($_POST["contact"]);
	
	$query="update freight set destination='$destination', consignment='$consigment', contact='$contact', reference='$reference' where freightID='$freightID'";

	if ($conn->query($query) == TRUE) {
		require 'register.php';
	}	
}elseif ($_GET["action"] == "createNew"){
	$tType = stripInput($_POST["tType"]);
	$tNumber = stripInput($_POST["tNumber"]);
	$destination = stripInput($_POST["destination"]);
	$consignment = stripInput($_POST["consignment"]);
	$reference = stripInput($_POST["reference"]);
	$ticket = strtoupper($tType)." ".$tNumber;
	if(preg_match($validCleanTicket, $ticket)){
		$query = "INSERT INTO freight (freightTicket, destination, consignment, reference, contact, date) values ('$ticket', '$destination', '$consignment', '$reference', '$contact', '$date')";
		
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