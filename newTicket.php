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
<tr><td>Ticket Type: <input type='text' size='3' maxlength='3' name='tType'> Ticket Number: <input type='text' size='12' maxlength='12' name='tNumber' required></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Destination</td><td>Date</td></tr>
<tr><td><input required type='text' name='destination' size='50'></td><td><?php echo $date; ?></td></tr>
<tr class="titleRow"><td>Consignment:</td><td>Reference</td></tr>
<tr><td colspan='2'><textarea required rows='15' cols='100' name='consignment'></textarea></td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Reference</td><td>Contact:</td></tr>
<tr><td><input required type='text' size='50' name='reference'></td>
<td><input required type='text' size='50' name='contact'></td></tr>
<tr><td></td><td></td></tr>
</table>

<input type="submit" value="Submit">
</form>

</div>

<div id="footNav">

</div>

</body>
</html>