<div id='topNav'><a href='index.php'>Freight Register Home</a> | <a href='newTicket.php'>New Ticket</a></div>
<div id='titleBar'>The Listening Post Freight Register</div>
<div id='mainContent'>
<!---This section handles display control information. Display order, etc.--->
    <div id='displayControl'>
        <?php
	        require 'includes/displayOrder.php';
			$display = displayOrder();
		?>
<!--- Displays the Choosers for display priority --->

        <form id='displayFilter' action='<?php print basename($_SERVER['PHP_SELF']); ?>' method='get' onchange='change()'>
        <input type="hidden" name='page' value='<?php print $display["page"]; ?>'>
        <input type="hidden" name='searchQuery' value='<?php print $display["search"]; ?>'>
        <select name='order'>
            <option value='normal' <?php print $display["orderNorm"]; ?> >OldestFirst</option>
            <option value='invert' <?php print $display["orderInv"]; ?> >Newest First</option>
        </select>
        <span id='pageDiv'>Page <?php print $display["page"]; ?></span>
        <button type='submit' name='page' value='<?php print $display["page"] - 1; ?>'>Previous Page</button>
        <select name='displayNum'>
            <option value='50' <?php print $display["num50"]; ?> >50</option>
            <option value='100' <?php print $display["num100"]; ?> >100</option>
            <option value='200' <?php print $display["num200"]; ?> >200</option>
        </select>
        <button type='submit' name='page' value='<?php print $display["page"] + 1; ?>'>Next Page</button>
        </form>
        <div id='search'>
            <form action='search.php' method='post'>
                <input type='text' name='searchQuery' value='<?php print $display["search"]; ?>'><input type='submit' value='Search'>
            </form>
        </div>
    </div>
    
<!--- Displays the selected records --->
    <table id='freightRegister'>
        <tr class="titleRow"><td width='25px'>#</td><td>Ticket Number</td><td>Destination</td><td>Consignement</td><td>Date Sent</td><td>Reference</td></tr>
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
            print "<tr><td>".$rowCount."</td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["freightTicket"]."</td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["destination"]."</a></td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["consignment"]."</a></td><td><a href=ticket.php?ticket=".$row["freightID"].">".date('d M Y', strtotime($row["date"]))."</a></td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["reference"]."</a></td></tr>";  
            
            $rowCount++;
        }
        ?>
</table>
</div>
