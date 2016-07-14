<?php 
	require('../db-config.php');
	session_start();
//pag may matching key

	print_r($_SESSION);

	$user_id = $_SESSION['user_id'];
	$secretkey = $_SESSION['key'];

	echo $query =	"SELECT is_admin,username FROM users
				WHERE user_id = $user_id
				AND secretkey = '$secretkey'
				LIMIT 1";

	$result = $db->query($query);

	if(!$result){
		header('Location:login.php');
	}

	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
		define('USER_ID',user_id);
		define('IS_ADMIN',$row['is_admin']);
		define('IS_ADMIN',$row['username']);
	}else{
		die('u cant look at this shit');
	}



 ?>

<!doctype html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
</head>
<body>
	<header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <li class="users"><a href="#">My Account</a></li>
    <li class="logout warn"><a href="login.php?action=logout">Log Out</a></li>
  </ul>
</header>

<nav role='navigation'>
  <ul class="main">
    <li class="dashboard"><a href="#">Dashboard</a></li>
    <li class="write"><a href="#">Write Post</a></li>
    <li class="edit"><a href="#">Edit Posts</a></li>
    <li class="comments"><a href="#">Comments</a></li>
    <li class="users"><a href="#">Manage Users</a></li>
  </ul>
</nav>

<main role="main">
  <section class="panel important">
    <h2>Welcome to Your Dashboard </h2>
    <ul>
      <li>Important panel that will always be really wide Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
      <li>Aliquam tincidunt mauris eu risus.</li>
      <li>Vestibulum auctor dapibus neque.</li>
    </ul>
  </section>
  <section class="panel">
			<h2>Your Content:</h2>
			<ul>
				<li>You have written XX published posts</li>
				<li>You have written XX Post Drafts</li>
				<li>Latest Draft: POST TITLE</li>
			</ul>
			
		</section>
		<section class="panel">
			<h2>Most Popular:</h2>
			<ul>
				<li>POST TITLE with XX comments</li>
				<li>POST TITLE with XX comments</li>
				<li>POST TITLE with XX comments</li>
			</ul>
		</section>

	</main>

	<footer>
		&copy; 2015 Your Name Here!
	</footer>
</body>
</html>