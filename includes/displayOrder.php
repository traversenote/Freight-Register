<?php

function displayOrder(){
	
	if(basename($_SERVER['PHP_SELF']) == 'search.php' && isset($_POST["searchQuery"])){
		$display["search"] = test_input($_POST["searchQuery"]);
	}else{
		$display["search"] = test_input($_GET["searchQuery"]);
	}

	if(isset($_GET['order'])){
		$display["page"] = test_input($_GET['page']);
		if($display["page"] <= 0){ $display["page"]=1; }
		$display["number"]= test_input($_GET['displayNum']);
		$display["filter"] = test_input($_GET['display']);
		$display["order"] = test_input($_GET['order']);
		$display["filter"] = test_input($_GET['display']);
		
		switch($display["order"]) {
			case 'invert':
				$display["order"] = 'ORDER BY freightID DESC';
				$display["orderNorm"] = '';
				$display["orderInv"] = 'selected';
				
				break;
			default:
				$display["order"] = 'ORDER BY freightID  ASC';
				$display["orderNorm"] = 'selected';
				$display["orderInv"] = '';
				break;
		}
		switch($display["number"]) {
			case '100':
				$display["num50"] = '';
				$display["num100"] = 'selected';
				$display["num200"] = '';
				break;
			case '200':
				$display["num50"] = '';
				$display["num100"] = '';
				$display["num200"] = 'selected';
				break;
			default:
				break;
		}
}else{
		$display["order"] = 'ORDER BY freightID  ASC';
		$display["orderNorm"] = 'selected';
		$display["orderInv"] = '';
		$display["number"] = '50';
		$display["num50"] = 'selected';
		$display["num100"] = '';
		$display["num200"] = '';
		$display["page"] = '1';
	}
	return $display;
}

?>