<?php

function stripInput($data) {
	$length = 100;
	if (strlen($data) > $length){
		 $data=substr($data, 0, $length);
	}
	$data = trim($data);
	$data = stripslashes($data);
	$data = addslashes($data);
	$data = htmlspecialchars($data);
	
	return $data;
}

#Ensures a valid ticket and retuns the type - Post Haste or Fliways - as an array [$ticket, $type]. It also includes a third variable if it's a post haste ticket for 'cleanTicket'.
function ticketTest($ticket){	
	stripInput($ticket);
	
	#ticket format for Post Haste
	$postHasteFormat='/[0-9][A-Z]{5,6}\ +[0-9]{10}/';
	#clean post haste ticket
	$postHasteClean='/[A-Z]{2,3}\ +[0-9]{8,10}/';
	
	#ticket format for FliWay
	$fliWayFormat = '/([A-Z]){3}([0-9]){8}/';
	
	if(preg_match($postHasteFormat, $ticket)){
		$checkedTicket[0] = substr(preg_replace('!\s+!', ' ',$ticket), 4, 11);
		$ticketCode = explode(" ", $ticket);
		if (isset($ticketCode[2])) {
			$ticketCode[1] = $ticketCode[2];
		}		
		$out = [$checkedTicket[0], '1', $ticketCode];
		return $out;
	}elseif(preg_match($postHasteClean, $ticket)){
		$ticketCode = explode(" ", $ticket);
		if (isset($ticketCode[2])) {
			$ticketCode[1] = $ticketCode[2];
		}
		$out = [$ticket, '1', $ticketCode];
		return $out;
	}elseif(preg_match($fliWayFormat, $ticket)){
		$out = [$ticket, '2'];
		return $out;
	}else{
		$out = [$ticket, '0'];
		return $out;
	}
}
  echo "<script>\nfunction change(){\ndocument.getElementById('displayFilter').submit();\n}\n</script>\n";
?>