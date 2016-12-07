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

if(isset($_POST['searchQuery'])){
	$searchQuery = stripInput($_POST['searchQuery']);
}else{
	$searchQuery = stripInput($_GET['searchQuery']);
}
$queryMethod = 'search';

require 'includes/register.php';


?>
</body>
</html>