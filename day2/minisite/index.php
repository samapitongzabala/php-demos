<?php
	error_reporting( E_ALL & ~E_NOTICE );
	if($_GET['page'] == ''){
		$_GET['page'] = 'home';
	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>navigate on me with queries daddy</title>
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

			.cf:before,
			.cf:after {
				content:"";
				display: block;
			}
			
			.cf:after {
				clear: both;
			}
			
			.cf {
				zoom: 1;
			}
			
			body{
				font-family: 'Open Sans',sans-serif;
				width: 1200px;
				margin: auto;
				background:
linear-gradient(27deg, #151515 5px, transparent 5px) 0 5px,
linear-gradient(207deg, #151515 5px, transparent 5px) 10px 0px,
linear-gradient(27deg, #222 5px, transparent 5px) 0px 10px,
linear-gradient(207deg, #222 5px, transparent 5px) 10px 5px,
linear-gradient(90deg, #1b1b1b 10px, transparent 10px),
linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
background-color: #131313;
background-size: 20px 20px;
				font-weight: 300;
			}

			h1,h2,h3,h4,h5,h6{
				font-weight: 300;
			}

			main,footer,header{

				padding: 3em;
			}

			header nav ul li{
				display: inline-block;
			}

			a:before{
				content:"[";
				position:absolute;
				left: .5em;
				opacity: 0;
				transition: all ease-in-out .25s;
			}

			a:after{
				content:"]";
				position:absolute;
				right: .5em;
				opacity: 0;
				transition: all ease-in-out .25s;
			}

			a:hover:before{
				left: -.5em;
				opacity: 1;
			}

			a:hover:after{
				right: -.5em;
				opacity: 1;
			}

			header nav{
				position:absolute;
				bottom: 0;
				right: 0;
				left: 0;
				background: rgba(0,0,0,.5);
			}

			header nav ul li a{
				text-decoration: none;
				color: #FFF;
				font-size: 1.25em;
				padding: 0 .25em;
				height: 90px;
				position: relative;
				line-height: 90px;
				display: block;
				margin: 0 1em;
			}

			header h1{
				font-size: 8em;
				background: rgba(0,0,0,.5);
				width: 50%;
				padding: .25em;
			}

			main{
				background: white;
			}

			main img{
				float: left;
				margin: 0 1em 1em 0;
			}
			main h2{
				font-size: 3em;
				margin: 0 auto 1em;
			}

			main p{
				line-height: 1.5;
				font-weight: 400;
				margin-bottom: 2em;
			}

			#dhome li.nhome,
			#dgallery li.ngallery,
			#dabout li.nabout,
			#dcontact li.ncontact{
				border-bottom: 5px solid white;
			}

			header{
				background: #000 url(http://placekitten.com/g/1200/500);
				background-size: cover;
				text-align: center;
				height: 400px;
				position: relative;
				color: #FFF;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			}

			footer{
				background: #333;
				color: white;
				text-align: center;
				text-transform: uppercase;
			}
		</style>
	</head>
	<body id="d<?php echo $_GET['page']?>">
		<header>
			<h1>ASS</h1>
			<nav>
				<ul>
					<li class="nhome">
						<a href="index.php?page=home">Home</a>
					</li>
					<li class="ngallery">
						<a href="index.php?page=gallery">Gallery</a>
					</li>
					<li class="ncontact">
						<a href="index.php?page=contact">Contact</a>
					</li>
					<li class="nabout">
						<a href="index.php?page=about">About</a>
					</li>
				</ul>
			</nav>
		</header>
		<main class="cf">
			<?php 
			switch( $_GET['page'] ){
				case 'gallery':
				include('content-gallery.php');
				break;
				case 'contact':
				include('content-contact.php');
				break;
				case 'about':
				include('content-about.php');
				break;

				default:
				include('content-home.php');
			}
			?>
		</main>
		<footer>
			&copy; Sam 2016. fuck bitches get monaaaaaaaaaaayyy
		</footer>
	</body>
</html>