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
			echo "The Freight Ticket ".$ticket." appears to exist already: <a href=ticket.php?ticket='".urlencode($checkedTicket[0])."'> See here </a>";
		}elseif($approved != 1){
			print "You don't seem to have permissions to perform this action.";
		}else{
			require 'mobile.php';
		}
	}else{
		Echo $ticket." doesn't appear to be a valid ticket number.";
	}
}

?>