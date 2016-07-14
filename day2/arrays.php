<?php
//flatt
$movies = array('Jungle Book','High School Musical','Deadpool','High School Musical 2','High School Musical 3');
sort($movies);

//associative
$groceries =array(
	'milk' => '1 gallon',
	'eggs' => 12,
	'dildos' => 69,
	'bottles of wine' =>'1000 gallon' //an => arrow yan
);

$groceries['olives'] = 'up my ass';//inaad to sa list


?>



<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>arrays bitch</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/reset.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<pre>
		<?php
			//ugly lil shit
			echo print_r($movies);

			echo print_r($groceries);
		 ?>
	</pre>
		<?php
			foreach($movies as $movie){
				echo '<h2>'.$movie.'</h2>';
			};
			//show if empt array or nah
			if(!empty($groceries)){

		
		?>
		<hr>
		<h1>grocery fuckr</h1>
		<ul>
		<?php foreach($groceries AS $item => $amount){?>
			<li><b><?php echo $item;?></b> Quantity: <?php echo $amount;?></li>
		<?php } ?>
		</ul>
		<?php } ?>
	</body>
</html>