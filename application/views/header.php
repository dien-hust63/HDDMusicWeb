<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
$logged = isset($_SESSION['user_login_status']) || isset($_SESSION['admin_login_status']);
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HDD Music Website</title>
	<style>
		<?php require(ROOT . "/public/css/theme.css"); ?>
	</style>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

	<div class="nav">
		<input type="checkbox" id="nav-check">
		<div class="nav-header">
			<div class="nav-title">
				<img src=<?php echo BASE_PATH . DS . "public" . DS . "assets" . DS . "img" . DS . "logo.png" ?> style="height: 40px">
			</div>
		</div>
		<div class="nav-btn">
			<label for="nav-check">
				<span></span>
				<span></span>
				<span></span>
			</label>
		</div>

		<div class="nav-links">
			<a href=<?php echo SONG_VIEWALL ?>>Songs</a>
			<a href=<?php echo ARTIST_VIEWALL ?>>Artists</a>
			<a href=<?php echo PATH_LOG?> >Login</a>
			<a href=<?php echo PATH_REG?> >Register</a>
		</div>
	</div>
</head>

<body>