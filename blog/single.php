<!--pang saro na post ineee
link got get single.php?post_id=X
-->
<?php 
$post_id= $_GET['post_id'];

require('header.php');
if( $_POST['nagsend'] ){
	//extract n sanitize
	//validate
	//ye
	$name = strip_tags(mysqli_real_escape_string($db,$_POST['name']));
	$email = strip_tags(mysqli_real_escape_string($db,$_POST['email']));
	$url = strip_tags(mysqli_real_escape_string($db,$_POST['url']));
	$bod = strip_tags(mysqli_real_escape_string($db,$_POST['bod']));

	$valid = true;

	if(name==''){
		$valid = false;
		$errors['name'] = 'gimme ur name bitch';
	}

	if(!filter_var(email, FILTER_VALIDATE_EMAIL)){
		$valid = false;
		$errors['email'] = 'gimme ur email bitch';
	}

	if(bod==''){
		$valid = false;
		$errors['bod'] = 'gimme ur bod bitch';
	}

	if(valid){
		$newcomment = "INSERT INTO comments
						(name,date,body,url,email,is_approved,post_id)
						VALUES ('$name',now(),'$bod','$url','$email',1,$post_id)";
		$result = $db->query($newcomment);
		if( $db->affected_rows == 1){
			$feedback = 'u good';
		}else{
			$feedback = ' u fucked';
		}
	}else{

		$feedback = "u suck";
	}
}
 ?>
		<main>
			<?php
				//set up query, run,. check, loop, free
				$get_post ="SELECT	posts.title,
									posts.date,
									posts.post_id,
									posts.user_id,
									posts.body,
									users.username,
									users.user_id,
									categories.name,
									categories.category_id
							FROM 	posts,users,categories
							WHERE 	posts.is_published = 1
							AND 	posts.user_id = users.user_id
							AND 	posts.category_id = categories.category_id 
							AND 	posts.post_id = $post_id
							LIMIT 1";

				$result = $db->query($get_post);
				if( $result->num_rows >= 1){
					while($row = $result ->fetch_assoc()){
			?>
			<article>
				<h2><?php echo $row['title'];?></h2>
				<h3>
					Posted by <a href="author.php?user_id=<?php echo $row['user_id'] ?>"><?php echo $row['username'] ?></a>
					on <?php echo fuck($row['date']);?>
					in  <?php echo $row['name'] ?>
					with <?php echo count_comments($row['post_id'],false) ?>
				</h3>
				<p><?php echo $row['body'];?></p>
			</article>
			<?php
				comment($post_id);


				}

				if(isset($feedback)){
					echo '<div class="feedback>'.$feedback.'</div>';
				}

				//if comment open dinhe
				// if($row['allowcomments']){
				?>
				<h2 id="commenthere">FUUUUUUUUUCK</h2>
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>?post_id=<?php echo $post_id ?>#commenthere" method="post">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" value="<?php echo $name ?>">
						<label for="email">Email</label>
						<input type="email"  name="email" id="email" value="<?php echo $email ?>">
						<label for="url">URL</label>
						<input type="url"  name="url" id="url" value="<?php echo $url ?>">
						<label for="bod">Message</label>
						<textarea name="bod" id="bod"></textarea>
						<input type="submit" value="nagcomment" value="<?php echo $bod ?>">
						<input type="hidden" name="nagsend" value="1"> 
					</form>

				<?php
				// }

				$result -> free();
				}else{
					echo 'bitch';
				} 

			?>
		</main>
<?php include('aside.php');
require('footer.php'); ?>