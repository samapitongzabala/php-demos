<?php 

/**
 * oh
 * ha
 * hilinga ining doc block
 * so sexy
 * so fucky
 * oooooohhh
 *
 * @param $array yeah
 * @param $key sam ung error
 * @todo  ewan
 * @author  me <[<email address>]>
 */

//pang customiize kang error
function inline_error($array, $key ){
	if(isset($array[$key]) ){
		echo 'class="error"';
	}
}

//pang sabi kung anyare pag sala
function form_feedback($feedback,$errors){
	if( isset($feedback) ){
		echo '<div class="pidbak">';
		echo '<h3 class="feedback">';
		echo $feedback;
		echo '</h3>';

		if(! empty($errors) ){
			echo '<ul>';
			foreach($errors AS $error ){
				echo '<li>'.$error.'</li>';
			}
			echo '</ul>';
		}

		echo '</div>';
	}
}


?>