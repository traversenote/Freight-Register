<!DOCTYPE html>
<?php
setcookie("testCookie['first']", "Blank", time() + (86400 * 30), "/");
setcookie("testCookie['second']", "Not BLank");
?>
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<title>Cookie Test</title>
</head>

<body>
Hello.
<?php
print $_COOKIE["testCookie"]["second"];
?>
</body>
</html>
