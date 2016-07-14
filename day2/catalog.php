
<?php 
	$products = array(
		1 => array(
				'title' => 'Plaid dildo',
				'description' => 'It\'s a fucking dildo',
				'price' => '$999.99',
				'image' => 'http://placekitten.com/250/250',
		),
		2 => array(
				'title' => 'Plaid egg',
				'description' => 'It\'s a fucking egg',
				'price' => '$99.99',
				'image' => 'http://placekitten.com/312/312',
		),
		3 => array(
				'title' => 'Plaid watch',
				'description' => 'It\'s a fucking watch',
				'price' => '$9',
				'image' => 'http://placekitten.com/200/200',
		),
		4 => array(
				'title' => 'Plaid dvd',
				'description' => 'It\'s a fucking dvd',
				'price' => '$9.99',
				'image' => 'http://placekitten.com/300/300',
		),
	);

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>oh fuck</title>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<style>

		/* Every browser has a different set of defaults, so it is imporant to use a clean slate for the reset, and link it into index.html */
		
		
		html, body, div, span, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		abbr, address, cite, code,
		del, dfn, em, img, ins, kbd, q, samp,
		small, strong, sub, sup, var,
		b, i,
		dl, dt, dd, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td,
		article, aside, canvas, details, figcaption, figure, 
		footer, header, main, menu, nav, section, summary, 
		time, mark, audio, video {
		    margin:0;
		    padding:0;
		    border:0;
		    outline:0;
		    font-size:100%;
		    vertical-align:baseline;
		    background:transparent;
		}
		
		body {
		    line-height:1;
		}
		
		article,aside,details,figcaption,figure,
		footer,header,main,menu,nav,section { 
		    display:block;
		}
		
		nav ul {
		    list-style:none;
		}
		
		blockquote, q {
		    quotes:none;
		}
		
		blockquote:before, blockquote:after,
		q:before, q:after {
		    content:'';
		    content:none;
		}
		
		a {
		    margin:0;
		    padding:0;
		    font-size:100%;
		    vertical-align:baseline;
		    background:transparent;
		}
		
		/* change colours to suit your needs */
		ins {
		    background-color:#ff9;
		    color:#000;
		    text-decoration:none;
		}
		
		/* change colours to suit your needs */
		mark {
		    background-color:#ff9;
		    color:#000; 
		    font-style:italic;
		    font-weight:bold;
		}
		
		del {
		    text-decoration: line-through;
		}
		
		abbr[title], dfn[title] {
		    border-bottom:1px dotted;
		    cursor:help;
		}
		
		table {
		    border-collapse:collapse;
		    border-spacing:0;
		}
		
		/* change border colour to suit your needs */
		hr {
		    display:block;
		    height:1px;
		    border:0;   
		    border-top:1px solid #cccccc;
		    margin:1em 0;
		    padding:0;
		}
		
		input, select {
		    vertical-align:middle;
		}

		body {
			width: 1200px;
			margin: auto;
			background: #FFF;
			font-family: 'Open Sans',sans-serif;
			font-weight: 300;
			padding: 3em 3em 5em;
		}

		h1{
			font-size: 4em;
			text-align: center;
			margin-bottom: .5em;
			font-weight: 300;
		}

		h3{
			text-align: center;
			margin-bottom: 5em;
		}

		figure a{
			display: block;
			margin-top: 1em;
			text-align: center;
			text-decoration: none;
			color: #FFF;
			background: cadetblue;
			padding: 1em;
		}

		figure a:hover,
		figure a:active,
		figure a:focus{
			background: rgb(85, 148, 150)
;
		}

		html{
			background: #333;
			display: flex;
			height: 100%;
			width: 100%;
			align-items: center;
			justify-content: center;
		}

		figure{
			background: #eee;
			margin: 0 .5%;
			max-width: 200px;
			color: #333;
			width: 24%;
		}
		figure img{
			max-width:100%;
			height: auto;
		}

		figcaption{
			padding: 1em;
		}

		figcaption h2{
			font-size: 1.5em;
			line-height: 1.5;
		}

		figcaption .price{
			color: crimson;
			font-size: 1.25em;
			font-weight: bold;
			line-height: 1.5;
		}

		div{
			display: flex;
			justify-content: space-around;
			width: 80%;
			margin: 0 auto;
			flex-wrap: wrap;
		}
		</style>
	</head>
	<body>
		<h1>Our Products</h1>
		<?php if( isset($_GET['id']) ){ //if user added a shit
			$id = $_GET['id'];
			?> 
			<h3 class="message">u added <?php echo $products[$id]['title']; ?> to your shit</h3>
		<?php
			}?>
			<div>
			<?php if( !empty($products) ){
				foreach($products as $id => $product){
		?>
		<figure>
			<img src="<?php echo $product['image']?>" />
			<figcaption>
				<h2><?php echo $product['title']?></h2>
				<span class="price"><?php echo $product['price']?></span>
				<p><?php echo $product['description']?></p>
				<a href="catalog.php?id=<?php echo $id ?>">add to my shit</a>
			</figcaption>
		</figure>
		<?php
				}
			}else{
				echo '<p>not a fucking thing</p>';
			}
		?>
		</div>
	</body>
</html>