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

$ticket = test_input($_POST["ticket"]);
$destination = test_input($_POST["destination"]);
$consignment = test_input($_POST["consignment"]);
$contact = test_input($_POST["contact"]);
$reference = test_input($_POST["reference"]);
$date = date("Y-m-d");
$validTicketFormat='/[0-9][A-Z]{5,6}\ +[0-9]{10}/';
$validCleanTicket='/[A-Z]{2,3}\ +[0-9]{10}/';

	if(!preg_match($validCleanTicket, $ticket)){
		echo $ticket;
	}else{
	
	if(preg_match($validCleanTicket, $ticket)){
		
		$query = "INSERT INTO freight (freightTicket, destination, consignment, reference, contact, date) values ('$ticket', '$destination', '$consignment', '$reference', '$contact', '$date')";
		
		if ($conn->query($query) == TRUE) {
			$queryMethod = 'display';
			require 'register.php';
		} else {
			echo "Problem here boss:". $sql. "<br>". $conn->error;
		}
	}else { 
		
		echo "Ticket ".$ticket." Failed Validation";
	}
}
?>

</body>
</html>
