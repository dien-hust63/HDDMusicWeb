<!-- 
<?php
if (isset($_SESSION['user_login_status']) || isset($_SESSION['admin_login_status'])) {
	if ($_SESSION['user_login_status'] == 1) {
		echo "<br/> Hey " . $_SESSION['user_name'] . ". You are logged in.
		Try to close this browser tab and open it again. Still logged in!";
?><form action="login/signin" method="post" >
		<input type="submit" value="Log out" name="logout"></form><?php
																} else if ($_SESSION['admin_login_status'] == 1) {
																	echo "<br/> Hey admin " . $_SESSION['admin_name'] . ". You are logged in.
		Try to close this browser tab and open it again. Still logged in!";
																	include(LOG_OUT);
																}
															} else {
																	?>
	<form action="http://localhost/HDDMusicWeb\login\signin" method="post">
	<input type="submit" value="Log in"></form>
	<form action="login/signin" method="post">
	<input type="submit" value="Log in"></form><?php
															}
												?> 
-->
<h1 class="front-text">Welcome to HustMP3</h1>
<h3 class="sub-header">Choose your favorite artist and enjoy the music</h3>

<?php
$number = 0;

?>
<div class="artist-list">
	<?php foreach ($artist as $artistitem) : ?>
		<?php $path = BASE_PATH . "/artist/viewdetail/" . $artistitem['Artist']['id'] . "/" . strtolower(str_replace(" ", "-", $artistitem['Artist']['name'])); ?>
		<a class="big" href="<?php echo  $path ?>">
			<div class="artist">
				<!--
					<?php echo ++$number ?> 
				-->
				<?php echo $artistitem['Artist']['name'] ?>
			</div>
		</a>
	<?php endforeach ?>
</div>