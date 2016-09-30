<?php 

$ticketCode = explode(" ", $ticket);
if (isset($ticketCode[2])) {
	$ticketCode[1] = $ticketCode[2];
}

?>

<form action='index.php?action=createNew' method='post'>
<!---?><input type='hidden' name='ticket' value='<?php #echo $ticket; ?>'> --->
<input type='hidden' name='tType' value='<?php echo $ticketCode[0];?>'>
<input type='hidden' name='tNumber' value='<?php echo $ticketCode[1]; ?>'>
<div class='mobileTitle'><label for='destination'>Destination</label></div>
<div><input class='mobile' type='text' name='destination'></div>
<div class='mobileTitle'><label for='destination'>Consignment</label></div>
<div><textarea  class='mobile' rows='5' cols='20' name='consignment'></textarea></div>
<div class='mobileTitle'><label for='reference'>Reference</label></div>
<div><input  class='mobile' type='text' name='reference'></div>
<div class='mobileTitle'><label for='contact'>Contact</label></div>
<div><input class='mobile' type='text' name='contact' value='<?php echo $source; ?>'></div>
<input class='mobile' type='submit' value='submit'>
