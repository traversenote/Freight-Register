<!DOCTYPE html >
<html lang='en'>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='freightRegister.css' />
<title>Freight Ticket <?php echo htmlspecialchars($_GET["freightTicket"]); ?></title>
</head>
<?php
include 'dbCredentials.php';
include 'functions.php';

if($_GET["ticket"]) {
    $record = urldecode($_GET["ticket"]);

    $query = "SELECT * FROM freight WHERE freightID=$record";
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

    $checkedTicket = ticketTest($ticket);
    switch($checkedTicket[1]){
    	case 1:
#    		$ticketCode = explode(" ", $checkedTicket);
#    		if (isset($ticketCode[2])) {
#    			$checkedTicket[2][1] = $ticketCode[2];
#    		}
    		$trackingURL = "http://www.posthaste.co.nz/phl/servlet/ITNG_TAndTServlet?page=1&Key_Type=Ticket&VCCA=Enabled&product_code=".$checkedTicket[2][0]."&serial_number=".$checkedTicket[2][1];
    		$fCompany = 'Post Haste';
    		break;
    	case 2:
    		$trackingURL = "http://online.fliway.com/Public/Track/?id=".$checkedTicket[0]."&iframe=false";
    		$fCompany = 'Fliways';
    		break;
    }

#tracking URL for fliwayhttp://online.fliway.com/Public/Track/?id=<NUMBER>&iframe=false
}else{
	echo "no get record found";
}

?>
<body>
<div class="container-fluid">
	<div class="row" id='topNav'><div class="col-sm-4"></div><div class="col-sm-4"><a href='index.php'>Freight Register Home</a> | <a href='newTicket.php'>New Ticket</a></div><div class="col-sm-4"></div></div>
	<div class="row" id='titleBar'>The Listening Post Freight Register</div>
	<div class="container" id='mainContent'>
		<form action="index.php?action=update&ticket=<?php echo $freightID ?>" method="post">
<!-- 			<table id="ticket">
				<tr><td>Track and Trace with <?php echo $fCompany; ?>: <a target='_blank' href='<?php echo $trackingURL; ?>'><?php echo $checkedTicket[0]; ?></a></td><td>Internal Record Number: <?php echo "<input type='hidden' name='freightID' value='".$freightID."'>".$freightID; ?></td></tr>
	 				<tr><td></td><td></td></tr>
	 				<tr class="titleRow"><td>Destination</td><td>Date</td></tr>
				<tr><td><input type='text' name='destination' value='<?php echo $destination; ?>' size='50'></td><td><?php echo $date; ?></td></tr>
	 				<tr class="titleRow"><td>Consignment:</td><td>Reference</td></tr>
				<tr><td colspan='2'><?php echo "<textarea rows='15' cols='100' name='consignment'>".$consignment."</textarea>"; ?></td></tr>
	 				<tr><td></td><td></td></tr>
	 				<tr class="titleRow"><td>Reference</td><td>Contact:</td></tr>
				<tr><td><?php echo "<input type='text' size='50' name='reference' value='".$reference."'>"; ?></td><td><input type='text' size='50' name='contact' value='<?php echo $contact; ?>'></td></tr>
					<tr><td></td><td></td></tr>
	 			</table>
	 			<input class="btn btn-default" type="submit" value="Submit"> -->
			<div class="row" >
				<div class="col-md-6">
					<p>Track and Trace with <?php echo $fCompany; ?>: <a target='_blank' href='<?php echo $trackingURL; ?>'><?php echo $checkedTicket[0]; ?></a></p>
				</div>
				<div class="col-md-2">
					Internal Record Number: <?php echo "<input type='hidden' name='freightID' value='".$freightID."'>".$freightID; ?>
				</div>
			</div>
			<div class="row title">
				<div class="col-md-6"><p>Destination: </p></div>
				<div class="col-md-6"><p>Date: </p></div>
			</div>
			<div class="row">
				<div class="col-md-6"><input class="form-control" type='text' name='destination' value='<?php echo $destination; ?>' size='50'></div>
				<div class="col-md-6"><p><?php echo $date; ?></p></div>
			</div>
			<div class="row title">
				<div class="col-md-6"><p><label for="consignment">Consignment</label></p></div>
				<div class="col-md-6"></div>
			</div>
			<div class="row">
				<div class="col-md-6"><p><textarea class="form-control" rows="3" name='consignment'><?php echo $consignment; ?></textarea> </p></div>
				<div class="col-md-6"></div>
			</div>
			<div class="row title">
				<div class="col-md-6"><p><label for="reference">Reference</label></div>
				<div class="col-md-6"><p><label for="contact">Contact</label></p></div>
			</div>
			<div class="row">
				<div class="col-md-6"><input class="form-control" type="text" name="reference" value="<?php $reference; ?>"></div>
				<div class="col-md-6"><input class="form-control" type="text" name="contact" value="<?php $contact; ?>"></div>
			</div>
			<div class="row">
				<div class="col-md-6"><input class="btn btn-default" type="submit" value="Submit"></div>
				<div class="col-md-6"></div>
			</div>
		</form>
	</div>

</div>
</body>
</html>
