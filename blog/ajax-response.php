<?php 
/**
 * Display output
 * this file has no doctype and will never leave server
 * runs query and tetirns text
 */
require( 'db-config.php' );
$category_id = $_GET['cat_id'];
$query = "SELECT posts.title,posts.body,users.username
			FROM posts,users
			WHERE posts.user_id = users.user_id
			AND posts.is_published = 1
			AND posts.category_id = $category_id
			ORDER BY date DESC";
$result = $db->query($query);
if(!$result){
	echo $db->error;
}

?>
<h2><?php echo $result->num_rows; ?> of Shiet</h2>
<?php 
	if($result->num_rows>=1){
		while( $row = $result->fetch_assoc() ){
 ?>
<article>
	<h3><?php echo $row['title'] ?></h3>
	<h4><?php echo $row['username'] ?></h4>
	<p><?php echo $row['body'] ?></p>
</article>
<?php 
		}//while ne
	}//if

 ?>