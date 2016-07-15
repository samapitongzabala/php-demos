<?php

require('adminheader.php');
include_once('../functions.php');

if($_POST['did_save']){

	$allowed_tags = '<img><br><hr><p><i><a><h1><h2><h3><h4><h5><h6><blockquote>';

	$title = 			mysqli_real_escape_string( $db , strip_tags($_POST['title']) );
	$body = 			mysqli_real_escape_string( $db , strip_tags($_POST['body'], $allowed_tags) );
	$is_published = 	mysqli_real_escape_string( $db , filter_var($_POST['is_published'], FILTER_SANITIZE_NUMBER_INT) );
	$allow_comments = 	mysqli_real_escape_string( $db , filter_var($_POST['allow_comments'], FILTER_SANITIZE_NUMBER_INT) );
	$category_id = 	mysqli_real_escape_string( $db , filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT) );

	//checkbox sanitizing some more pag sakaling null sha
	if($is_published == ''){
		$is_published = 0;
	}

	if($allow_comments == ''){
		$is_published = 0;
	}

	$valid = true;

	if($title == ''){
		$valid = false;
		$errors['title'] = 'dipshit';
	}

	if($body == ''){
		$valid = false;
		$errors['body'] = 'dipshit for real';
	}

	if(!is_numeric($category_id)){
		$valid = false;
		$errors['category_id'] = 'u fuck';
	}

	if($valid){
		$query = "INSERT INTO posts
					(user_id,title,date,category_id,body,is_published,allow_comments)
					VALUES ($user_id,'$title',now(),$category_id,'$body',$is_published,$allow_comments)";
		$result = $db->query($query);

		if(!$result){
			$feedback = 'god';
		}elseif($db->affected_rows == 1){
			$feedback = 'it saved';
		}else{
			$feedback = 'aawww';
		}
	}else{
		$feedback = 'ew';
	}
}

?>
	
  <section class="panel important">
    <h2>write shit </h2>
    <?php form_feedback($feedback,$errors) ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="twothirds">
	    <label>title</label>
	    <input type="text" name="title" value="<?php stripslashes($title); ?>">

	    <label>bod</label>
	    <textarea name="body" value="<?php echo stripslashes($body); ?>"></textarea><!--para kung may inadd ang mysqli-->
    </div>
    <div class="onethird">
	    <label>
		    <input type="checkbox" name="is_published" value="1">
		    make it public
		</label>


	     <label>
		    <input type="checkbox" name="allow_comments" value="1">
		    make it commenty
		</label>

		 <label>category</label>


		<?php 
			$query=	"SELECT * FROM categories";
			$result = $db->query($query);
			if($result->num_rows >= 1){
		 ?>
		    <select name="category_id">
		    	<?php 
		    		while($row = $result->fetch_assoc()){
		    	 ?>	
		    			<option value="<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></option>
				<?php
	    			}
				?>
		    
		    </select>
	    <?php 
			}
		?>
   </div>
   <input type="submit" value="save that shit">
   <input type="hidden" name="did_save" value="1">

    </form>
  </section>


	<?php require('adminfooter.php') ?>