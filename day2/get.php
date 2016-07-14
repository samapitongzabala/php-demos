<?php
	error_reporting( E_ALL & ~E_NOTICE );
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>get method shit</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			* {
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
			}

			body{
				width: 400px;
				margin: 0 auto;
				background-color: oldlace;
				font-family: georgia,sans-serif;
			}

			form{
				background: white;
				padding: 1em;
			}

			label{
				display: block;
				text-align:center;
				margin: 1em 0 .5em;
			}

			input{
				display: block;
				width: 100%;
				padding: .5em;
			}

			input[type="submit"]{
				margin: 2em auto 0;
				width: 30%;
				background: deepskyblue;
				border: none;
				padding: 1em;
				color: white;
			}
		</style>
	</head>
	<body>
	<h1>what for tanghalian</h1>
	<?php 

	if( $_GET['name'] != '' ){
		echo '<h2>sup '.$_GET['name'].'</h2>';
	}
	if(
		$_GET['name'] != '' &&
		$_GET['lunch'] != ''
	){
		echo '<h2>shove '.$_GET['lunch'].' up ya ass</h2>';
	}

	?>

	<form method="get" action="get.php">
		<label for="name">the fuck your name?</label>
		<input type="text" name="name" value="<?php echo $_GET['name']; ?>">
		<label for="lunch" >the fuck your lunch?</label>
		<input type="text" name="lunch" value="<?php echo $_GET['lunch']; ?>">
		<input type="submit" value="bitch">
	</form>
	</body>
</html>