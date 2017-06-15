<!DOCTYPE html>
<html lang="ua">
<head>
	<title><?php echo $mainConfig['siteTitle'] ?></title>
	<meta name="Description" content="Блог вчителя">
	<meta name="Keywords" content="ККЗ, Київ, Математика, Навчання">
	<meta charset="utf-8">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/main1.js"></script>
</head>
<body>
<header>
	<div class="head-info">
		<a href="index.php">
			<h1><?php echo $page['title'] ?></h1>
		</a>
		<span><?php echo $mainConfig['slog'] ?></span>
	</div>
</header>
<?php require('view/mainMenu.php');?>


