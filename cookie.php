<!DOCTYPE html>
<?php
$lookie = array("one"=>"look", "two"=>"I have space", "three"=>"I am the third"); #Create an array
setcookie("testCookie", serialize($lookie), time() + (86400 * 30), "/"); #serialize the array for storage

#Another approach
function cookie_encode($obj) {
	$value = json_encode($obj);
	$value = base64_encode($value);
	return $value;
}
$second = array("one"=>"look", "two"=>"I have space", "three"=>"I am the third"); #Create an array
$secondCookie= cookie_encode($second);
setcookie("otherCookie", $secondCookie, time() + (86400 * 30), "/"); #serialize the array for storage
?>
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<title>Cookie Test</title>
</head>

<body>
Hello.
<?php
$ticket=unserialize($_COOKIE["testCookie"]);
print $ticket["one"];
function cookie_decode($value) {
	$value = base64_decode($value);
	$value = json_decode($value, true);
	return $value;
}
$seconds = cookie_decode($_COOKIE["otherCookie"]);
$seconds2 = json_encode($lookie);
print "</br>";

var_dump($seconds2);
?>
</body>
</html>
