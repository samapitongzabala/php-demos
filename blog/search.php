<?php
	require('header.php');

	$per_page = 10;
	$current_page = 1;

	$phrase = mysqli_real_escape_string($db,$_GET['phrase']);

	$query = 	"SELECT title,body,date,post_id
				FROM posts
				WHERE (title LIKE '%$phrase%'
					OR body LIKE '%$phrase%')
				AND is_published = 1";

	$result = $db->query($query);
	$totalposts = $result->num_rows;
?>
<main>
	<?php
		if($totalposts >=1){
			$totalpages = ceil($totalposts/$per_page);

			if($_GET['page']){
				$current_page = $_GET['page'];

			}

			if( $current_page<=$totalpages){
				$offset = ($current_page - 1) * $per_page;
				$query .= " LIMIT $offset,$per_page";
 				$result = $db->query($query);
	 			?>
				<h2>
					<?php 
						echo $totalposts;
					 ?>

					 posts found in

					 <?php 
						echo $phrase;
					 ?>
				</h2>
				<?php 
					while($row = $result->fetch_assoc() ){
				 	?>
						<h3>page X of X</h3>

						<article>
							<h2><a href=""><?php echo $row['title']; ?></a></h2>
							<span><?php echo fuck($row['date']); ?></span>
							<p><?php echo substr($row['body'],0,55); ?>&hellip;</p>
						</article>
						<?php

					}
				}else{
					echo '<h2>oh god</h2>';
				}
		}else{
			echo '<h2>nothing in this shit</h2>';
		}	

		$prev = $current_page - 1;
		$nek = $current_page + 1;
	?>

	<section class="pagination">
		
		<?php 
			if($current_page > 1){
		 	?>
				<a href="search.php?phrase=<?php echo $phrase; ?>&amp;page=<?php echo $prev ?>">prev</a>
			<?php
			}

			$counter = 1;
			while($counter <= $totalpages){
				if($counter == $currentpage){
					echo $counter;
					echo '<span class="current">'.$counter.'</span>';
				}else{
					echo '<a href="search.php?phrase='.$phrase.'&amp;page='.$counter.'">'.$counter.'</a>';
				}

				$counter++;

			}
			
			if($current_page < $totalpages){
		 	?>
				<a href="search.php?phrase=<?php echo $phrase; ?>&amp;page=<?php echo $nek ?>">nek</a>
			<?php
			}
		?>

	</section>

</main>



<?php 
include('aside.php');
include('footer.php');
 ?>