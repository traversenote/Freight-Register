<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='freightRegister.css' />
<title>Freight Codes</title>
</head>

<body>
<?php
include 'dbCredentials.php';
include 'functions.php';

$date = date("Y-m-d");
$allowNew="yes";
#ticket format for Post Haste
$validTicketFormat='/[0-9][A-Z]{5,6}\ +[0-9]{10}/';
#ticket format for FliWay
#$fliWayFormat = '/([A-Z]){3}([0-9]){11}/';
$validCleanTicket='/[A-Z]{2,3}\ +[0-9]{8}/';

if(isset($_GET["action"])){
	switch($_GET["action"]){
		case 'create':
			require 'includes/create.php';
			break;
		case 'update':
			require 'includes/update.php';
			break;
		case 'createNew':
			require 'includes/createNew.php';
			break;
		default:
			$queryMethod = 'display';
			require 'includes/register.php';
	}
}else{
	$queryMethod = 'display';
	require 'includes/register.php';
}

?>
</body>
</html>