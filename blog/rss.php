<?php

echo '<?xml version="1.0" encoding="utf-8" ?>';
require('db-config.php');

function timestamp($date){
	$date = new DateTime($date);
	return $date->format('r');
}

?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>Diz Blog</title>
		<link>http://localhost/zabala_samara/demos/blog/</link>
		<description>
			fuck this shiet
		</description>

		<atom:link href="http://localhost/zabala_samara/demos/blog/rss.php" rel="self" type="application/rss+xml" />

		<?php 

			$query = 	"SELECT posts.title,
								posts.post_id,
								posts.body,
								posts.date,
								users.email,
								users.username
						FROM 	posts,users
						WHERE 	users.user_id = posts.user_id
						AND 	posts.is_published = 1
						ORDER BY date DESC
						LIMIT 10";

			$result = $db->query($query);

			if(!$result){
				echo $db->error;
			}

			if($result->num_rows>=1){
				while($row = $result->fetch_assoc() ){
		 		?>
					<item>
						<title>TITLE</title>
						<link>http://localhost/zabala_samara/demos/blog/single.php?post_id=<?php echo $row['post_id']; ?></link>
						<guid>http://localhost/zabala_samara/demos/blog/single.php?post_id=<?php echo $row['post_id']; ?></guid>
						<description>
							<![CDATA[<?php echo $row['body']; ?>]]>
						</description>
						<author><?php echo $row['email']; ?> (<?php echo $row['name'] ?>)</author>
						<pubDate><?php echo timestamp($row['date']) ?></pubDate>
					</item>
					<?php 
				}
			}
		?>
	</channel>
</rss>