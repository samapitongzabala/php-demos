<?php 
session_start();
//temp
error_reporting( E_ALL & ~E_NOTICE );
$correct_username = 'fucker69';
$correct_password = 'bitch';

//parse form if user submitted it

if($_POST['sent']){
	//extract data
	$username = $_POST['username'];
	$password = $_POST['password'];
	//validate
	//check credentials
	//tsaka ilog in
	if( $username === $correct_username &&
		$password === $correct_password ){
		$feedback = "yaaaaaaas";
		setcookie( 'loggedin',true,time()+60*60*24*7);
		$_SESSION['loggedin'] = true;
		header('Location:profile.php'); //after storing shit. redirects this fuck
	}else{
		$feedback = "u suck";
	}
}
//para logged in  sya kahit pagkatapos mo sya layasan
if($_GET['action'] == 'logout'){
	session_destroy();
	//erase session shit with blank array
	$_SESSION =array();
	setcookie('loggedin','',time()-99999999999999);
	$feedback = 'youre dead to me';

}

elseif($_COOKIE['loggedin'] ){
	$_SESSION['loggedin'] = true;
}

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Log in</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link href="css/reset.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" /> -->
		<style>
		body{
			background:khaki;
			padding: .5em;
			font-family: verdana;
		}

		* {
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}
		</style>
	</head>
	<body>
	<?php
		if( $_SESSION['loggedin'] ){
			echo 'u logged';
		}else{

	?>
	<h1>log in bitch</h1>
	<!--para self referential no matter how i change that shit filename-->

	<?php if( isset($feedback) ){ ?>
	<div class="feedback">
		<?php echo $feedback;?>
	</div>
	<?php } ?>
	
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<label for="username">Username</label>
		<input type="text" name="username" id="username">
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<input type="submit" value="submit">
		<input type="hidden" name="sent" value="true">
	</form>
	<?php }?>


		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript">
		</script>
	</body>
</html>