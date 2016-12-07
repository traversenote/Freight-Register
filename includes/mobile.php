
<form action='index.php?action=createNew' method='post'>
<?php

switch($checkedTicket[1]){
	case 1:
		echo "<input type='hidden' name='carrier' value='".$checkedTicket[1]."'>\n<input type='hidden' name='tType' value='".$checkedTicket[2][0]."'>\n<input type='hidden' name='tNumber' value='".$checkedTicket[2][1]."'>";
		break;
	case 2:
		echo "<input type='hidden' name='carrier' value='".$checkedTicket[1]."'>\n<input type='hidden' name='tNumber' value='".$checkedTicket[0]."'>";
		break;
}

?>
<div class='mobileTitle'><label for='destination'>Destination</label></div>
<div><input required class='mobile' type='text' name='destination'></div>
<div class='mobileTitle'><label for='destination'>Consignment</label></div>
<div><textarea  required class='mobile' rows='5' cols='20' name='consignment'></textarea></div>
<div class='mobileTitle'><label for='reference'>Reference</label></div>
<div><input  required class='mobile' type='text' name='reference'></div>
<div class='mobileTitle'><label for='contact'>Contact</label></div>
<div><input required class='mobile' type='text' name='contact' value='<?php echo $source; ?>'></div>
<input class='mobile' type='submit' value='submit'>
</form>
