<!--pang saro na post ineee
link got get single.php?post_id=X
-->
<?php 

error_reporting( E_ALL & ~E_NOTICE );
$category_id= $_GET['category_id'];

require('header.php');
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
							AND 	categories.category_id = $category_id
							ORDER BY date DESC
							LIMIT 10";

				$result = $db->query($get_post);
				if( $result->num_rows >= 1){
					while($row = $result->fetch_assoc()){
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
					
					$categories = "SELECT categories.name,categories.category_id, COUNT(categories.name) AS postcount
					FROM categories,posts
					WHERE posts.category_id = categories.category_id
					GROUP BY posts.category_id
					ORDER BY categories.name ASC";

					$result = $db->query($categories);

					if( $result->num_rows >= 1){
				 ?>
					<section>
						<h2>Categories</h2>
						<ul>
							<?php
								while($row = $result->fetch_assoc() ){ ?>
							<li>
								<a href="category.php?category_id=<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></a>
								(<?php echo $row['postcount'] ?>)
							</li>

							<?php
								}
								$result->free();
							?>
						</ul>
					</section>
			<?php }
				} 

			?>
		</main>
<?php include('aside.php');
require('footer.php'); ?>