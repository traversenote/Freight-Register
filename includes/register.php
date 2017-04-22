<div class="panel" id='titleBar'>The Listening Post Freight Register</div>

<div class="container" id='mainContent'>
<!---This section handles display control information. Display order, etc.--->
    <div class="row" id='displayControl'>
        <?php
	        require 'includes/displayOrder.php';
			$display = displayOrder();
		?>
<!--- Displays the Choosers for display priority --->

        <form id='displayFilter' class='form-inline' action='<?php print basename($_SERVER['PHP_SELF']); ?>' method='get' onchange='change()'>
        	<input type="hidden" name='page' value='<?php print $display["page"]; ?>'>
        	<input type="hidden" name='searchQuery' value='<?php print $display["search"]; ?>'>
        <div class="col-md-3">
	        <select class="form-control" name='order'>
	            <option value='normal' <?php print $display["orderNorm"]; ?> >OldestFirst</option>
	            <option value='invert' <?php print $display["orderInv"]; ?> >Newest First</option>
	        </select>
        </div>
        <div class="col-md-2"><p>Page <?php print $display["page"]; ?></p></div>
        <div class="col-md-4 col-md-offset-3">
	        <button class="btn btn-default" type='submit' name='page' value='<?php print $display["page"] - 1; ?>'>Previous Page</button>
	        <select class="form-control" name='displayNum'>
	            <option value='50' <?php print $display["num50"]; ?> >50</option>
	            <option value='100' <?php print $display["num100"]; ?> >100</option>
	            <option value='200' <?php print $display["num200"]; ?> >200</option>
	        </select>
        	<button class="btn btn-default" type='submit' name='page' value='<?php print $display["page"] + 1; ?>'>Next Page</button>
		</div>
        </form>

    </div>
    
<!--- Displays the selected records --->
<div class='container'>

        <div class='row titleRow'>
        	<div class='col-md-1'>#</div><div class='col-md-2'>Ticket Number</div><div class='col-md-2'>Destination</div><div class='col-md-3'>Consignement</div><div class='col-md-2'>Date Sent</div><div class='col-md-2'>Reference</div>
        </div>
        <?php 
        $pageIndex = $display["page"] * $display["number"];
        $queryOffset = $pageIndex - $display["number"];
        $rowCount = $queryOffset + 1;
if(basename($_SERVER['PHP_SELF']) == 'search.php'){
	$query = "SELECT * FROM freight WHERE (freightTicket LIKE '%$display[search]%' or destination LIKE '%$display[search]%' or consignment LIKE '%$display[search]%' or contact LIKE '%$display[search]%' or reference LIKE '%$display[search]%') $display[order] limit $queryOffset, $display[number]";
}else{
	$query = "SELECT * FROM freight $display[order] limit $queryOffset, $display[number]";
}
        $result = $freightdb->query($query);
        while($row = $result->fetch_assoc()) {
            print "<a href=index.php?action=display&ticket=".$row["freightID"]."><div class='row regRows'><div class='col-md-1 regCol'>".$rowCount."</div><div class='col-md-2 regCol'>".$row["freightTicket"]."</div><div class='col-md-2 regCol'>".$row["destination"]."</div><div class='col-md-3 regCol'>".$row["consignment"]."</div><div class='col-md-2 regCol'>".date('d M Y', strtotime($row["date"]))."</div><div class='col-md-2 regCol'>".$row["reference"]."</div></div></a>";  
            
            $rowCount++;
        }
        ?>
        </div>
</div>
