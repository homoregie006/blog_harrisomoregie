<?php
session_start();
require('config/db.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" type="image/png" href="images/nav_icon.png" />
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="styles.css" />
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
		<title>Ipsum Blog</title>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<?php include('layout/header.php')?>
			</header>
			<nav>
				<?php include('layout/nav.php')?>
			</nav>
			<div id="message">
				<?php include('layout/message.php')?>
			</div>
			<div id="content">
				<?php include('layout/content.php')?>
			</div>
			<footer>
				<?php include('layout/footer.php')?>
			</footer>
		</div>
	</body>
</html>