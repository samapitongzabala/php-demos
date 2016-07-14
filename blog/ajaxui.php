<?php require('db-config.php') ?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>yo fucka</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/ajaxstyle.css">
	</head>
	<body>
	<h1>bleh</h1>
		<?php
			$query = "SELECT * FROM categories";
			$result = $db->query($query);
			//check for query problem
			//
			if(!result){
				echo $db->error;
			}
		
			//if there are rows
			if($result->num_rows>=1){		


		 ?>
		<form>
			<select id="picker">
				<option>Choose shit</option>
				<?php while(  $row = $result->fetch_assoc() ){ ?>
					<option value="<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></option>
				<?php } ?>
			</select>
		</form>
		<?php 
			}
		?>
		<div id="display-area">Pick a shit</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript">
			$('#picker').change(function(){
				var cat_id = this.value;
				$.ajax({
					method	: 'GET',
					url		: ('ajax-response.php'),
					data	: {'cat_id' : cat_id },
					dataType: 'html',
					success	: function(response){
						$('#display-area').html(response);
					} 
				});
			});

			$(document).on({
				ajaxStart	: function(){ $('#display-area').addClass(loading);},
				ajaxStop	: function(){$('#display-area').removeClass('loading');}  
			})
		</script>

	</body>
</html>