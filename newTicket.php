<!DOCTYPE html >
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='freightRegister.css' />
<title>New Freight Ticket </title>
</head>

<body>
<div id='topNav'><a href='index.php'>Freight Register Home</a> | <a href='newTicket.php'>New Ticket</a></div>
<div id='titleBar'>The Listening Post Freight Register</div>
<div id='mainContent'>
<!--- Displays the Choosers for display priority --->
<?php $date = date('d M Y', strtotime(date("Y-m-d")));?>
<form action="index.php?action=createNew" method="post">
<table id="ticket">
<tr><td>Ticket Type: <input type='text' size='3' maxlength='3' name='tType' required> Ticket Number: <input type='text' size='10' maxlength='10' name='tNumber' required></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Destination</td><td>Date</td></tr>
<tr><td><input type='text' name='destination' size='50'></td><td><?php echo $date; ?></td></tr>
<tr class="titleRow"><td>Consignment:</td><td>Reference</td></tr>
<tr><td colspan='2'><textarea rows='15' cols='100' name='consignment'></textarea></td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Reference</td><td>Contact:</td></tr>
<tr><td><input type='text' size='50' name='reference'></td><td><input type='text' size='50' name='contact'></td></tr>
<tr><td></td><td></td></tr>
</table>
</div>

<div id="footNav">
<input type="submit" value="Submit">
</form>
</div>

</body>
</html>