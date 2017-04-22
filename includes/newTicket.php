<div class="panel" id='titleBar'>Manual Ticket Creation</div>

<div class="container" id='mainContent'>
<div class='row'>
	<div class='col-md-10 col-md-offset-2'>

    <!--- Grabs the current date to stamp the new freight Ticket --->
    <?php $date = date('d M Y', strtotime(date("Y-m-d")));?>

    <form class='form-group' action="index.php?action=upload" method="post">
        <div class='row'>
            <div class='col-md-5 titleRow'><label for='tType'>Ticket Type: </label></div>
            <div class='col-md-5 titleRow'><label for='tNumber'>Ticket Number: </label></div>
        </div>
        <div class='row'>
            <div class='col-md-5 inputRow'><input class='form-control' type='text' size='3' maxlength='3' name='tType'></div>
            <div class='col-md-5 inputRow'><input class='form-control' type='text' size='12' maxlength='12' name='tNumber' required></div>
        </div>
        <div class='row'>
            <div class='col-md-5 titleRow'>Destination</div>
            <div class='col-md-5 titleRow'>Date</div>
        </div>
        <div class='row'>
            <div class='col-md-5 inputRow'><input class='form-control' required type='text' name='destination' size='50'></div>
            <div class='col-md-5 inputRow'><?php echo $date; ?></div>
        </div>
        <div class='row'>
            <div class='col-md-5 titleRow'>Consignment:</div>
        </div>
        <div class='row'>
            <div class='col-md-10 inputRow'><textarea class='form-control' required rows='5' name='consignment'></textarea></div>
        </div>

        <div class='row'>
            <div class='col-md-5 titleRow'>Reference</div>
            <div class='col-md-5 titleRow'>Contact:</div>
        </div>
        <div class='row'>
            <div class='col-md-5 inputRow'><input class='form-control' required type='text' size='50' name='reference'></div>
            <div class='col-md-5 inputRow'><input class='form-control' required type='text' size='50' name='contact'></div>
        </div>
        <div class='row'>
            <div class='col-md-5 inputRow'><input  class='form-control' type="submit" value="Submit"></div>
        </div>
    </form>
</div>
</div>
</div>

