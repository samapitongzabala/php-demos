<?php 
function fuck($time){
	$dateout = new DateTime($time);
	return $dateout -> format('l,F j,Y');
}
/**
 * count the comments on a shit
 * @param  int $post_id aring post iyan
 * @param  bol $numonly kung pidi yung word ana comment
 * @return           count and word comment kung pidi
 */
function count_comments($post_id,$numonly){
	global $db; //para explore sya outside
	$query ="SELECT *, COUNT(*) AS count
	FROM comments
	WHERE post_id = $post_id
	AND is_approved = 1";

	$result = $db->query($query);

	if($result->num_rows>=1){
		while($row = $result->fetch_assoc() ){
			echo $row['count'];
			if(!$numonly && $row['count']!= 1){
				echo ' comments';
			}else if(!$numonly && $row['count'] = 1){
				echo ' comment';
			}
		}

		$result->free();
	}
}

function comment($post_id){
	global $db;
	 $comments = "SELECT name,date,body,url
			FROM comments
			WHERE is_approved=1
			AND post_id = $post_id
			ORDER BY date ASC
			LIMIT 10";


			$result = $db->query($comments);

			if($result->num_rows>=1){ ?>
			<section class="comments">
				<h2>SHIT Comments on this post:</h2>
				<ul>
					<?php while($row = $result->fetch_assoc()){ ?>
					<li>
						<h3>Comment from <?php echo $row['name'] ?> on <?php echo fuck($row['date']) ?>:</h3>
						<div class="commentbod"><?php echo $row['body'] ?></div>
					</li>
					<?php } ?>
				</ul>
			</section>
			<?php
			} 
}

