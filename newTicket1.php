$tType = test_input($_POST["tType"]);
$tNumber = test_input($_POST["tNumber"]);
$destination = test_input($_POST["destination"]);
$consignment = test_input($_POST["consignment"]);
$ticket = strtoupper($tType)." ".$tNumber;


if(!preg_match($validCleanTicket, $ticket)){
	echo "Ticket ".$ticket." Failed Validation";
}

$query = "SELECT * from freight where freightTicket='$ticket'";
$result = $conn->query($query);
if($result->num_rows >= 1 ){
	while($row = $result->fetch_assoc()) { $duplicate = $row["freightID"]; }
	echo "The Freight Ticket ".$ticket." appears to exist already: <a href=ticket.php?ticket=".$duplicate."> See here </a>";
}else{
	$query = "INSERT INTO freight (freightTicket, destination, consignment, contact, date) values ('$ticket', '$destination', '$consignment', '$contact', '$date')";
	if ($conn->query($query) == TRUE) {
		$queryMethod = 'display';
		require 'register.php';
	} else {
		echo "Problem here boss:". $sql. "<br>". $conn->error;
	}
}