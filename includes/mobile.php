<div class='container-fluid'>

    <form class='form-group' action='index.php?action=upload' method='post'>
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
        <div class='row'>
            <div class='col-md-5 col-xs-12 titleRow'><label for='destination'>Destination</label></div>
        </div>
        <div class='row'>
            <div class='col-md-5 col-xs-12'><input required class='form-control' type='text' name='destination'></div>
        </div>
        <div class='row'>
            <div class='col-md-5 col-xs-12 titleRow'><label for='destination'>Consignment</label></div>
        </div>
        <div class='row'>
            <div class='col-md-5 col-xs-12'><textarea required class='form-control' rows='5' cols='20' name='consignment'></textarea></div>
        </div>
        <div class='row form-inline'>
            <div class='col-md-2 col-xs-5 titleRow'><label for='reference'>Reference</label></div>
            <!--<div class='col-md-3 col-xs-6 titleRow'><label> This is a repair <input required id='repairCheck' class='checkbox' type='checkbox'></label>&nbsp;</div> -->
        </div>
        	<div class='row'>
            	<div class='col-md-5 col-xs-12'><input required class='form-control' type='text' name='Reference' placeholder='Reference'></div>
<!--             	<div class='col-md-5 col-xs-12' id='nonRepair'><input required class='form-control' type='text' name='reference' placeholder='Reference'></div> -->
			</div>
        <div class='row'>
            <div class='col-md-5 col-xs-12 titleRow'><label for='contact'>Contact</label></div>
        </div>
        <div class='row'>
            <div class='col-md-5 col-xs-12'><input required class='form-control' type='text' name='contact' value='<?php echo $source; ?>'></div>
        </div>
        <div class='row'>
            <div class='col-md-5 col-xs-12'><input class='form-control' type='submit' value='submit'></div>
        </div>
    </form>
</div>
