<?php
if(isset($_GET["source"]) && isset($_GET["ticket"]) && $allowNew == "yes"){
	$ticket = test_input($_GET["ticket"]);
	$source = test_input($_GET["source"]);

	if(!preg_match($validTicketFormat, $ticket)){
		echo $ticket;
	}else{
		$cleanTicket = substr(preg_replace('!\s+!', ' ',$ticket), 4, 11);
		$query = "SELECT * from freight where freightTicket ='$cleanTicket'";
		$result = $freightdb->query($query);
		
		if($result->num_rows >= 1 ){
			echo "The Freight Ticket ".$ticket." appears to exist already: <a href=ticket.php?ticket='".urlencode($cleanTicket)."'> See here </a>";
		}elseif($_GET["source"] != 'approved'){
			print "You don't seem to have permissions to perform this action.";
		}else{
			require 'mobile.php';
		}
	}
}
?>