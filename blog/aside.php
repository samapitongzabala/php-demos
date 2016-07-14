<?php $phrase = mysqli_real_escape_string($db,$_GET['phrase']); ?>
		<aside>
			<form action="search.php" method="get">
			<input id="searchBar" type="search" name="phrase" placeholder="ugh" <?php if($phrase !== ''){ ?>
				value="<?php echo $phrase ?>"
			<?php } ?>>
			<input id="searchButton" type="submit">
			</form>
		<?php
			$posts = 	"SELECT title,post_id
						FROM posts
						WHERE is_published = 1
						LIMIT 5";

			$result = $db->query($posts);

			if( $result->num_rows>=1 ){
		?>
			<section>
				<h2>Latest shit</h2>
				<ul>
				<?php while( $row = $result->fetch_assoc() ){ ?>
					<li><a href="single.php?post_id=<?php echo $row['post_id'] ?>"><?php echo $row['title']; ?></a> (<?php echo count_comments($row['post_id'],true); ?>)</li>
					<?php }
					$result->free(); ?>
				</ul>
			</section>
		<?php } ?>
		<?php
			$categories = "SELECT categories.name,categories.category_id, COUNT(categories.name) AS postcount
			FROM categories,posts
			WHERE posts.category_id = categories.category_id
			GROUP BY posts.category_id
			ORDER BY categories.name ASC";

			$result = $db->query($categories);

			if( $result->num_rows >= 1){
		 ?>
			<section>
				<h2><a href="category.php">Categories</a></h2>
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
			<?php } ?>
			<?php $links = "SELECT title,url FROM links"; 

			$result = $db->query($links);

			if( $result->num_rows>=1){

			?>
			<section>
				<h2><a href="links.php">Links</a></h2>
				<ul>
				<?php 
					while($row = $result->fetch_assoc()){
				 ?>
					<li><a href="<?php echo $row['url'] ?>" target= "_blank"><?php echo $row['title'] ?></a></li>
					<?php 
						}
						$result->free();
					 ?>
				</ul>
			</section>
			<?php } ?>
		</aside>