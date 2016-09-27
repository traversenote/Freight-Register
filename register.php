<div id='topNav'><a href='index.php'>Freight Register Home</a> | <a href='newTicket.php'>New Ticket</a></div>
<div id='titleBar'>The Listening Post Freight Register</div>
<div id='mainContent'>
<!---This section handles display control information. Display order, etc.--->
    <div id='displayControl'>
        <?php

        if(isset($_GET['order'])){
        	$page = test_input($_GET['page']);
        	if($page <= 0){ $page=1; }
        	$displayNum = test_input($_GET['displayNum']);
        	$displayFilter = test_input($_GET['display']);
        	$displayOrder = test_input($_GET['order']);
            $displayNum = test_input($_GET['displayNum']);
            $displayFilter = test_input($_GET['display']);
            $displayOrder = test_input($_GET['order']);
            switch($displayOrder) {
                case 'invert':
                    $displayOrder = 'ORDER BY freightID DESC';
                    $normalOrder = '';
                    $invertOrder = 'selected';
                    break;
                default:
                    $displayOrder = 'ORDER BY freightID  ASC';
                    $normalOrder = 'selected';
                    $invertOrder = '';
                    break;
            }
           switch($displayNum) {
                case '100':
                    $dNum50 = '';
                    $dNum100= 'selected';
                    $dnum200 = '';
                    break;
                case '200':
                    $dNum50 = '';
                    $dNum100= '';
                    $dnum200 = 'selected';
                    break;
                default:
                    $displayNum = '50';
                    $dNum50 = 'selected';
                    $dNum100 = '';
                    $dnum200 = '';
                    break;
            }               
        }else{
            $displayOrder = 'ORDER BY freightID  DESC';
            $normalOrder = '';
            $invertOrder = 'selected';
            $displayNum = '50';
            $dNum50 = 'selected';
            $dNum100 = '';
            $dnum200 = '';
            $page = '1';
        }
        ?>
<!--- Displays the Choosers for display priority --->
        <form id='displayFilter' action='index.php' method='get' onchange='change()'>
        <input type="hidden" name=page value='<?php echo $page; ?>'>
        <select name='order'>
            <option value='normal' <?php echo $normalOrder; ?> >OldestFirst</option>
            <option value='invert' <?php echo $invertOrder; ?> >Newest First</option>
        </select>
        <span id='pageDiv'>Page <?php echo $page ?></span>
        <button type='submit' name='page' value='<?php echo $page - 1; ?>'>Previous Page</button>
        <select name='displayNum'>
            <option value='50' <?php echo $dNum50; ?> >50</option>
            <option value='100' <?php echo $dNum100; ?> >100</option>
            <option value='200' <?php echo $dNum200; ?> >200</option>
        </select>
        <button type='submit' name='page' value='<?php echo $page + 1; ?>'>Next Page</button>
        </form>
        <div id='search'>
            <form action='search.php' method='post'>
                <input type='text' name='searchQuery'><input type='submit' value='Search'>
            </form>
        </div>
    </div>
    <table id='freightRegister'>
        <tr class="titleRow"><td width='25px'>#</td><td>Ticket Number</td><td>Destination</td><td>Consignement</td><td>Date Sent</td><td>Reference</td></tr>
        <?php 
        $pageIndex = $page * $displayNum;
        $queryOffset = $pageIndex - $displayNum;
        $rowCount = $queryOffset + 1;
if($queryMethod == 'search'){
	$query = "SELECT * FROM freight WHERE (freightTicket LIKE '%$searchQuery%' or destination LIKE '%$searchQuery%' or consignment LIKE '%$searchQuery%' or contact LIKE '%$searchQuery%' or reference LIKE '%$searchQuery%') $displayOrder";
}else{
	$query = "SELECT * FROM freight $displayOrder limit $queryOffset, $displayNum";
}
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$rowCount."</td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["freightTicket"]."</td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["destination"]."</a></td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["consignment"]."</a></td><td><a href=ticket.php?ticket=".$row["freightID"].">".date('d M Y', strtotime($row["date"]))."</a></td><td><a href=ticket.php?ticket=".$row["freightID"].">".$row["reference"]."</a></td></tr>";  
            
            $rowCount++;
        }
        ?>
</table>
</div>
