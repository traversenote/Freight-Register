
<?php

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
<div class="panel" id='titleBar'><?php echo $fCompany; ?>: <a target='_blank' href='<?php echo $trackingURL; ?>'><?php echo $checkedTicket[0]; ?></a></div>
<div class="container"  id='mainContent'>
<div class='row'>
	<div class='col-md-10 col-md-offset-2'>
	<form action="index.php?action=update&ticket=<?php echo $freightID ?>" method="post">
		<div class="form-group">
        <div class='row'>
            <div class='col-md-5 titleRow'>Destination</div>
            <div class='col-md-5 titleRow'>Date</div>
        </div>
		<div class='row'>
            <div class='col-md-5 inputRow'><input class="form-control" type='text' name='destination' value='<?php echo $destination; ?>' size='50'></div>
		    <div class='col-md-5 inputRow'><?php echo $date; ?></div>
		</div>
        <div class='row'>
            <div class='col-md-5 titleRow'>Consignment:</div>
        </div>
        <div class='row'>
            <div class='col-md-10 inputRow'><textarea class="form-control" rows="3" name='consignment'><?php echo $consignment; ?></textarea></div>
        </div>

        <div class='row'>
            <div class='col-md-5 titleRow'>Reference</div>
            <div class='col-md-5 titleRow'>Contact:</div>
        </div>
		<div class='row'>
            <div class='col-md-5 inputRow'><input class="form-control" type="text" name="reference" value="<?php $reference; ?>"></div>
		    <div class='col-md-5 inputRow'><input class="form-control" type="text" name="contact" value="<?php $contact; ?>"></div>
		</div>
			<p><label for="freightID">Internal Record Number:</label>
			<?php echo "<input type='hidden' name='freightID' value='".$freightID."'>".$freightID; ?></p>
			<input class="btn btn-default" type="submit" value="Submit">
		</div>
	</form>
</div>
</div>
</div>

