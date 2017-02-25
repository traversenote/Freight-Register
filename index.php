<!DOCTYPE html>
<html lang='en'>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='freightRegister.css' />
<title>Freight Codes</title>
</head>

<body>
<div class="container-fluid">
<?php
include 'dbCredentials.php';
include 'functions.php';

#URL query should be in the format of /index.php?action=create&ticket=<ticket>&source=<source>

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
</div>
</body>
</html>