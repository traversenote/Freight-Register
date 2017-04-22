<!DOCTYPE html>
<html lang='en'>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type='text/javascript' src='//code.jquery.com/ui/1.11.4/jquery-ui.min.js?ver=4.5.2'></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='freightRegister.css' />
<title>Freight Codes</title>
</head>

<body>
<div class="container-fluid">
	<div class="navbar" id='topNav'>
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href='index.php' class='fakeButton'>Freight Register Home</a></li>
				<li><a href='index.php?action=newTicket' class='fakeButton'>New Ticket</a></li>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li>
					<form action="search.php" class="navbar-form navbar-right" method="post">
                        <input type='text' class="form-control" name='searchQuery' value=''>
	        			<input class="btn btn-default" type='submit' value='Search'>
	        		</form>
	        	</li>
			</ul>
		</div>
	</div>
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
<div class="container panel" id='footNav'>
	 <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> The Listening Post - Contact jason@listeningpost.co.nz for any issues.
	</div>
</div>

</body>
</html>