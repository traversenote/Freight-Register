<!DOCTYPE html >
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='freightRegister.css' />
<title>Freight Ticket <?php echo htmlspecialchars($_GET["freightTicket"]); ?></title>
</head>
<?php
include 'dbCredentials.php';
include 'functions.php';

if($_GET["ticket"]) {
    $record = urldecode($_GET["ticket"]);

    $query = "SELECT * FROM freight WHERE freightTicket=$record";
    $result = $freightdb->query($query);
    
    while($row = $result->fetch_assoc()) {
        $freightID = $row["freightID"];
        $ticket = $row["freightTicket"];
        $destination = $row["destination"];
        $consignment = $row["consignment"];
        $reference = $row["reference"];
        $contact = $row["contact"];
        $date = date('d M Y', strtotime($row["date"]));
    }
$ticketCode = explode(" ", $ticket);
if (isset($ticketCode[2])) {
	$ticketCode[1] = $ticketCode[2];
}
$trackingURL = "http://www.posthaste.co.nz/phl/servlet/ITNG_TAndTServlet?page=1&Key_Type=Ticket&VCCA=Enabled&product_code=".$ticketCode[0]."&serial_number=".$ticketCode[1];

}else{
	echo "no get record found";
}

?>
<body>
<div id='topNav'><a href='index.php'>Freight Register Home</a> | <a href='newTicket.php'>New Ticket</a></div>
<div id='titleBar'>The Listening Post Freight Register</div>
<div id='mainContent'>

<form action="index.php?action=update&ticket=<?php echo $freightID ?>" method="post">
<table id="ticket">
<tr><td>Track and Trace: <a target='_blank' href='<?php echo $trackingURL; ?>'><?php echo $ticketCode[0]." ".$ticketCode[1]; ?></a></td><td>Internal Record Number: <?php echo "<input type='hidden' name='freightID' value='".$freightID."'>".$freightID; ?></td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Destination</td><td>Date</td></tr>
<tr><td><input type='text' name='destination' value='<?php echo $destination; ?>' size='50'></td><td><?php echo $date; ?></td></tr>
<tr class="titleRow"><td>Consignment:</td><td>Reference</td></tr>
<tr><td colspan='2'><?php echo "<textarea rows='15' cols='150' name='consignment'>".$consignment."</textarea>"; ?></td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Reference</td><td>Contact:</td></tr>
<tr><td><?php echo "<input type='text' size='50' name='reference' value='".$reference."'>"; ?></td><td><input type='text' size='50' name='contact' value='<?php echo $contact; ?>'></td></tr>
<tr><td></td><td></td></tr>
</table>

<input type="submit" value="Submit">
</form>
</div>

</body>
</html>