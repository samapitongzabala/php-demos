<?php 
session_start();
//temp
error_reporting( E_ALL & ~E_NOTICE );
$correct_username = 'fucker69';
$correct_password = 'bitch';

//parse form if user submitted it

if($_POST['did_log_in']){
	//extract data
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	//validate
	
	$valid = true;

	if( strlen($username) <8 OR
		strlen($username) > 15 ){
		$valid = false;
	}

	if( strlen($password) < 8 ){
		$valid = false;
	}

	//check credentials
	


	//tsaka ilog in
	if($valid){
		if( $username === $correct_username &&
			$password === $correct_password ){
			$feedback = "yaaaaaaas";
			setcookie( 'loggedin',true,time()+60*60*24*7);
			$_SESSION['loggedin'] = true;
			header('Location:profile.php'); //after storing shit. redirects this fuck
		}else{
			$feedback = "u suck";
		}
	}else{
		$feedback = "hahaha fuck ur wrong";
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

		/* Every browser has a different set of defaults, so it is imporant to use a clean slate for the reset, and link it into index.html */
		
		
			html, body, div, span, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			abbr, address, cite, code,
			del, dfn, em, img, ins, kbd, q, samp,
			small, strong, sub, sup, var,
			b, i,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td,
			article, aside, canvas, details, figcaption, figure, 
			footer, header, main, menu, nav, section, summary, 
			time, mark, audio, video {
			    margin:0;
			    padding:0;
			    border:0;
			    outline:0;
			    font-size:100%;
			    vertical-align:baseline;
			    background:transparent;
			}
			
			body {
			    line-height:1;
			}
			
			article,aside,details,figcaption,figure,
			footer,header,main,menu,nav,section { 
			    display:block;
			}
			
			nav ul {
			    list-style:none;
			}
			
			blockquote, q {
			    quotes:none;
			}
			
			blockquote:before, blockquote:after,
			q:before, q:after {
			    content:'';
			    content:none;
			}
			
			a {
			    margin:0;
			    padding:0;
			    font-size:100%;
			    vertical-align:baseline;
			    background:transparent;
			}
			
			/* change colours to suit your needs */
			ins {
			    background-color:#ff9;
			    color:#000;
			    text-decoration:none;
			}
			
			/* change colours to suit your needs */
			mark {
			    background-color:#ff9;
			    color:#000; 
			    font-style:italic;
			    font-weight:bold;
			}
			
			del {
			    text-decoration: line-through;
			}
			
			abbr[title], dfn[title] {
			    border-bottom:1px dotted;
			    cursor:help;
			}
			
			table {
			    border-collapse:collapse;
			    border-spacing:0;
			}
			
			/* change border colour to suit your needs */
			hr {
			    display:block;
			    height:1px;
			    border:0;   
			    border-top:1px solid #cccccc;
			    margin:1em 0;
			    padding:0;
			}
			
			input, select {
			    vertical-align:middle;
			}

		/**/

		html{
			width: 100%;
			height: 100%;
		}

		body{
			background:khaki;
			font-family: verdana;
			display: flex;
			height: 100%;
			width: 100%;
			justify-content: center;
			align-items: center;
		}

		* {
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		main{
			width: 25%;
			background: #FFF;
			margin: 0 auto;
			padding: 5em;
		}
	form{
		margin: 0 auto;
		width: 100%;
	}
	input{
		width: 100%;
		display: block;
	}
		label{
			display: block;
			margin: 1em  0 .5em;
		}
		</style>
	</head>
	<body>
		<main>
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
		</main>

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript">
		</script>
	</body>
</html>