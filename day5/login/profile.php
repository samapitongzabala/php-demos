<?php
	//security bitches
	error_reporting( E_ALL & ~E_NOTICE );
	session_start();
	if(!$_SESSION['loggedin']){
		// die('u killed it. thank u very fucking much');
		header('Location:login.php');
	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title></title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<a href="login.php?action=logout">Log the fuck out</a>
		<h1>Only logged in bitcheas see this</h1>
		<p>welcome bitch</p>
	</body>
</html>