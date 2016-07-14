<?php 
$db_name = 'zabala_blog';
$db_user = 'blogbitch';
$db_password = 'ass';

$db = new mysqli( 'localhost',$db_user,$db_password,$db_name);

if( $db->connect_errno>0){
	die('u killed it'.$db->connect_error);
}


error_reporting( E_ALL & ~E_NOTICE );

?>