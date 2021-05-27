<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
$logged = isset($_SESSION['user_login_status']) || isset($_SESSION['admin_login_status']);
$isAdmin = isset($_SESSION['admin_login_status']) && $_SESSION['admin_login_status'] == 1;
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
				<a style="display: block" href=<?php echo PATH_HOME ?>>
					<img src=<?php echo BASE_PATH . DS . "public" . DS . "assets" . DS . "img" . DS . "logo.png" ?> style="height: 40px">
				</a>
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
			<?php if (!$logged) : ?>
				<a href=<?php echo PATH_LOG ?>>Login</a>
				<a href=<?php echo PATH_REG ?>>Register</a>
			<?php elseif ($isAdmin): ?>
				<a href=<?php echo PATH_HOME ?>>Admin</a>
			<?php else : ?>

				<a href=<?php echo PLAYLIST_VIEWALL?>> Your playlists</a>
				<form method="post" action=<?php echo PATH_LOG?> style="display: inline">
					<button type="submit" type="submit" name="logout" value="Log out" class="link-button">
						Logout
					</button>
				</form>
			<?php endif; ?>
		</div>
	</div>
</head>

<body>