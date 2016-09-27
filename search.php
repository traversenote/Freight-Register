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

$searchQuery = test_input($_POST['searchQuery']);

$queryMethod = 'search';

require 'register.php';


?>
</body>
</html>