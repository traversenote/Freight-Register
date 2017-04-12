
<?php
if(isset($_GET["source"]) && isset($_GET["ticket"]) && $allowNew == "yes"){
	$ticket = stripInput($_GET["ticket"]);
	$source = stripInput($_GET["source"]);
	
	switch($source) {
		case 'Jason': 
			$approved=1;
			break;
		case 'ShopPhone':
			$approved=1;
			break;
		case 'Richard':
			$approved=1;
			break;
		default:
			$approved=0;
			break;
	}
	$checkedTicket = ticketTest($ticket);
	if($checkedTicket[1] != '0'){
		$query = "SELECT * from freight where freightTicket ='$checkedTicket[0]'";
		$result = $freightdb->query($query);
	
		if($result->num_rows >= 1 ){
			$row = $result->fetch_assoc();
			echo "<div class='mobileTitle'>The Freight Ticket ".$checkedTicket[0]." appears to exist already: <a href=ticket.php?ticket='".$row["freightID"]."'> See here </a></div>";
		}elseif($approved != 1){
			print "<div class='mobileTitle'>You don't seem to have permissions to perform this action.</div>";
		}else{
			require 'mobile.php';
		}
	}else{
		echo "<div class='mobileTitle'>".$ticket." doesn't appear to be a valid ticket number.</div>";
	}
}else{
 require 'includes/register.php';
}

?>
