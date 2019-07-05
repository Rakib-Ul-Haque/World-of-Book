<?php
	$fonts="Times New Roman";
	$bgcolor="#000000";
	$fontcolor="#ffffff";
?>
<!DOCTYPE html>
<html>
<head>
	<title>World of Books</title>
	<link rel="shortcut icon" href="symbol.png" />
	
	<style>
		body{font-family: <?php echo $fonts;?>;},
		.phpcoding{width:900px; margin: 0 auto;background:<?php echo "#ddd"?>;}
		.headeroption,.footeroption{background:<?php echo $bgcolor;?>;color:<?php echo $fontcolor;?>;text-align:center;padding:20px;}
		.maincontent{min-height:400px;padding:20px;background-image: url(images/I-BP.jpg);background-size: 1200px 450px;}
		.headeroption h2,.footeroption h2{margin:0}
		p{margin:0}
		
		.dropbtn {
			background-color: #000000;
			color: white;
			padding: 16px;
			font-size: 16px;
			border: none;
			cursor: pointer;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #fff;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		.dropdown-content a:hover {background-color: #ffffff}
		.dropdown:hover .dropdown-content {
			display: block;
		}

		.dropdown:hover .dropbtn {
			background-color: #000000;
		}
	
	</style>
</head>
<body>

<div class="phpcoding">
	<section class="headeroption">
		<h2>World of Books</h2>
	</section>