

<?php 
	require('../db-config.php');
	include_once('../functions.php');

	if($_POST['did_register']){
		//sanitaze
		$username =	mysqli_real_escape_string( $db , strip_tags($_POST['username']));
		$email = 	mysqli_real_escape_string( $db , filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
		$password =	mysqli_real_escape_string( $db , strip_tags($_POST['password']));
		$tos = 		mysqli_real_escape_string( $db , strip_tags($_POST['tos'], FILTER_SANITIZE_NUMBER_INT));


		//validate
		$valid= true;

		//email is not within the length
		if( strlen($username)<5 OR strlen($username)>50 ){
			$valid = false;
			$errors['username'] = 'chose a good username bithc';
		}else{////alreade taken
			$query = 	"SELECT username
						FROM users
						WHERE username = '$username'
						LIMIT 1";

			$result = $db->query($query);
			if($result->num_rows == 1){
				$valid = false;
				$errors['username'] = 'someone got that already bitch';
			}
		}
		
		
		

		//emil is invalid
		if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
			$valid = false;
			$errors['email'] = 'the fuq kinda email is that';
		}else{
			$query = 	"SELECT email
						FROM users
						WHERE email = '$email'
						LIMIT 1";

			$result = $db->query($query);
			if( $result->num_rows == 1 ){//emailtaken
				$valid = false;
				$errors['email'] = 'u already signed for this ya dumb fuck';
			}

		}

		
		
		
		//password too shrot
		if( strlen($password)<8){
			$valid = false;
			$errors['password'] = 'ur password stinks';
		}
		
		//tos
		if( $tos != 1){
			$valid = false;
			$errors['tos'] = 'u bitch';
		}

		//add em to db
		if($valid){
			$query =	"INSERT INTO users
						(username,email,password,is_admin,date_joined)
						VALUES
						( '$username','$email', sha1('$password'),0,now() )";

			$result = $db->query($query);

			// if it added
			if( $db->affected_rows == 1){
				$feedback = 'yas bitch';
				
			}else{
				$feedback = 'we dont like u rn';
			}
		}else{
			$feedback = 'nope';
		}

	}
 ?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>fuck yourself</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			input,label{
				display:block;
				width: 500px;
			}

			input[type="checkbox"]{
				display:inline-block;
				width: auto;
			}
		</style>
	</head>
	<body>
			<h1>Sign up</h1>

			<?php 

				form_feedback($feedback,$errors);
			 ?>

			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
					<label>Choose a username:</label>
					<input type="text" name="username" required>
					<span class="hint">Choose a username between 5-50 characters</span>

					<label>Your Email Address:</label>
					<input type="email" name="email" required>

					<label>Password:</label>
					<input type="password" name="password" required><span class="hint">Choose a passwor at least 8 chars</span>

					<label>
						<input type="checkbox" name="tos" value="1">
						By signing up you agree to shit
					</label>
					<input type="hidden" name="did_register" value="1">
					<input type="submit">

			</form>


		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript">
		</script>
	</body>
</html>	