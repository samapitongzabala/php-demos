<?php require('header.php'); ?>
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
							FROM posts,users,categories
							WHERE posts.is_published = 1
							AND posts.user_id = users.user_id
							AND posts.category_id = categories.category_id 
							ORDER BY posts.date DESC";

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
				}

				$result -> free();
				}else{
					echo 'bitch';
				} 

			?>
		</main>
<?php include('aside.php');
require('footer.php'); ?>