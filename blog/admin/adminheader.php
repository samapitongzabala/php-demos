<?php 
  require('../db-config.php');
  session_start();
//pag may matching key

  print_r($_SESSION);

  $user_id = $_SESSION['user_id'];
  $secretkey = $_SESSION['key'];

  echo $query = "SELECT is_admin,username FROM users
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
    <li class="dashboard"><a href="index.php">Dashboard</a></li>
    <li class="write"><a href="adminwrite.php">Write Post</a></li>
    <li class="edit"><a href="adminedit.php">Edit Posts</a></li>
    <li class="comments"><a href="admincomments.php">Comments</a></li>
    <li class="users"><a href="adminprofile.php">Manage Users</a></li>
  </ul>
</nav>

<main role="main">