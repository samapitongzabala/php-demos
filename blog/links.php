
<?php

require('header.php');
 $links = "SELECT title,url FROM links"; 

		$result = $db->query($links);

		if( $result->num_rows>=1){

		?>
		<main>
			<h2>Links</h2>
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
		</main>
		<?php
		}

require('aside.php');
require('footer.php');
?>