<?php
error_reporting( E_ALL & ~E_NOTICE );
include('funkycontact.php');

$valid_reasons = array(
	'bike'=> 'Shoved a bike up my ass',
	'hi'=> 'Hello, it\'s me',
	'shrek'=> 'Shrek',
	'never'=> 'Never gonna give you up',
	'fuck'=> 'Fuck',
	);



if( $_POST['did_submit'] ){
 	//extract clean and send
 	$name 		= filter_var( $_POST['name'], 		FILTER_SANITIZE_STRING);
 	$email 		= filter_var( $_POST['email'], 		FILTER_SANITIZE_EMAIL);
 	$phone 		= filter_var( $_POST['phone'], 		FILTER_SANITIZE_NUMBER_INT);
 	$reason 	= filter_var( $_POST['reason'], 	FILTER_SANITIZE_STRING);	
 	$message 	= filter_var( $_POST['message'], 	FILTER_SANITIZE_STRING);
 	$newsletter = filter_var( $_POST['newsletter'], FILTER_SANITIZE_STRING);

 	$valid = true;

 	if( $newsletter != 'true'){ //para incase may mag laag ng code
 		$newsletter = 'false';
 	}

 	if( $name == '' ){
 		$valid=false;
 		$errors['name'] = 'fill in some shit name';
 	}

 	if( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
 		$valid=false;
 		$errors['email'] = 'ur email succ';
 	}

 	if( ! filter_var( $phone, FILTER_VALIDATE_INT ) ){
 		$valid=false;
 		$errors['phone'] = 'what u dont have a phone or what';
 	}

 	if(!array_key_exists($reason, $valid_reasons)){ // kung nasa laog ng shet
 		$valid=false;
 		$errors['reason'] = 'TELL ME WHY THE FUCK U CALL ME BITCH';
 	}

 	if($valid){
	 	$to 		= 'samarazabala0314@platt.edu';
	 	$subject 	= "$name is trying to fuck u up because of $reason";
	 	$body		="Name: $name \n";
	 	$body		.="Email: $email \n"; // slash n is line break. .= is += for javascript
	 	$body		.="Phone: $phone \n";
	 	$body		.="Reason: $valid_reasons[$reason] \n";
	 	if($newsletter == 'true'){
	 		$body		.="sign me the fuck up for th newsletter \n";
	 	}
	 	$body		.="Message: $message \n";

	 	$header 	= 'from: me, <samapitongzabala@gmail.com> \r\n';
	 	$header		.="Reply-to: $email";

	 	$did_send = mail($to,$subject,$body,$header);
	}

 	if( $did_send ){
 		$feedback ='congratolesyons. u won wan melyon cas';
 		$css_class = 'success';
 		header("Location:thank.php?name=$name");
 	}else{
 		$feedback ='euw';
 		$css_class = 'error';
 	}
 }
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>SHIET</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			/*end rest*/

			* {
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
			}

			body{
				background:  #333 url(http://placekitten.com/g/2000/1200);
				background-size: cover;
				height: 100vh;
				width: 100%;
				min-width: 800px;
				font-weight: 300;
				color: #FFF;
				display: flex;
				flex-direction: column;
				flex-wrap: wrap;
				align-items: center;
				justify-content: center;
				font-family: Calibri,Arial,sans-serif;
			}

			body>div{
				background: rgba(0,0,0,.75);
				width: 500px;
				padding: 2em;
				flex: 0 0 auto;

				margin:auto;
				border-radius: 10px;
			}

			form,.pidbak, h1{
				width: 80%;
				margin: 0 auto;
			}

			h1{
				font-size: 2em;
				margin-bottom: .25em;
				text-align: center;
				font-weight: 300;
			}
			form *{
				appearance: none;
				border: 0;
				font-family: inherit;
				font-size: inherit;
			}

			label{
				display: block;
				width: auto;
				text-transform: uppercase;
				margin-bottom: .5em;
			}
			input,select,textarea{
				display: block;
				border-radius: 5px;
				width: 100%;
				color: #FFF;
				margin-bottom: 1em;
				border: 1px solid #FFF;
				background: transparent;
			}

			input,select{
				padding: 0 1em;
				height: 40px;
				line-height: 40px;
			}

			option{
				background: #000;
				padding: .5em 0;
				display: block;
				line-height: 25px;
				height: 25px;
			}

			h3{
				font-weight: 300;
			}

			ul{
				margin: .5em 0;
			}

			li{
				margin-left: 1.5em;
			}

			textarea{
				padding: 1em;
				height:100px;
				margin-bottom: .5em;
			}

			.pidbak{
				background: rgba(255,255,255,.75);
				color: #000;
				padding: .5em;
				margin: 1em auto;
				border-radius: 5px;
			}

			input[type="checkbox"]{
				display: inline;
				margin: 0;
				width: auto;
			}

			input[type="submit"]{
				color: #000;
				background-color: #FFF;
				border: none;
				height: 50px;
				line-height: 50px;
				padding: 0 2em;
				width: auto;
				text-transform: uppercase;
			}

			form input.error,
			form select.error{
				border: solid 2px crimson;
			}

			form label.error{
				color: crimson;
			}
		</style>
	</head>
	<body class="<php? echo $css_class?>">
		<div>
			<h1>CONTACT THE FUCK OUTTA ME</h1>
			<?php form_feedback($feedback,$errors); ?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
				<label for="name" <?php inline_error($errors,'name'); ?>>Name</label>
				<input type="text" name="name" id="name" value="<?php echo $name ?>" <?php inline_error($errors,'name'); ?>>

				<label for="email" <?php inline_error($errors,'email'); ?>>Email</label>
				<input type="email" name="email" id="email" value="<?php echo $email; ?>" <?php inline_error($errors,'email'); ?>>

				<label for="phone" <?php inline_error($errors,'phone'); ?>>Phone Number</label>
				<input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>" <?php inline_error($errors,'phone'); ?>>

				<label for="reason" <?php inline_error($errors,'reason'); ?>>Why u call me bitch</label>
				<select name="reason" id="reason" <?php inline_error($errors,'reason'); ?>>
					<option>--Select one--</option>
					<?php foreach($valid_reasons AS $value => $label){ ?>
					<option value="<?php echo $value; ?>" <?php 
					if($reason == $value){
						echo 'selected';
					}
					?>>
						<?php echo $label; ?>
					</option>
					<?php } ?>
				</select>

				<label for="message">Message</label>
				<textarea name="message" id="message" value="<?php echo $message ?>"></textarea>

				<label for="newsletter">
					<input type="checkbox" name="newsletter" id="newsletter" value="true" <?php

					if($newsletter == 'true'){
						echo 'checked';
					} ?>>
					Subscribe to this shit
				</label>

				<input type="submit" value="Send This Shit">

				<input type="hidden" name="did_submit" value="true">
			</form>
		</div>
	</body>
</html>