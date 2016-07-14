<?php
	//define shit
	
	$breakfast ='tinapa';
	$drink = 'coffee';
	define('NAME','bitchin');
	include('includes/functions.php');
	$score=500;

	$status = 'error';

	if($status == 'success'){
		$title = 'yas bitch';
		$content = 'yaaaaaaaaaaaaaaaaaaaaaaas';
	}else{
		$title = 'awww boo hoo';
		$content = 'bitch';
	}

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>bleh</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<h1>shit</h1>

		<div class="<?php echo $status ?> message">
		<h2><?php echo $title; ?></h2>
		<p><?php echo $content; ?></p>
		</div>

		<?php 
		//single line ine
		/*wooooooo*/

		include('includes/nav.php');
		echo '<p>FUCK BITCHES GET MONAAAYYY</p>';
		echo $breakfast;
		echo '<p>$breakfast</p>';
		echo "<p>$breakfast</p>";
		echo "<p> nagkakan ako nin $breakfast tas dinutdut ko sa $drink</p>";
		echo NAME;
		echo '<h2>'.fuck('2016-06-20').'</h2>';

		if( $score >1000 ){
			echo '<p>u fuck ur not allowed to win</p>';
		}else{
			echo '<p>hahah bitch</p>';
		}

		switch(date('N')){//N is numeric representation of day of week
			case 1:
			echo 'bitch';
			break;
			case 2:
			echo 'shit';
			break;
			case 3:
			echo 'fuck';
			break;
			default: echo 'ass';
		}

		?>

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript">
		</script>
	</body>
</html>