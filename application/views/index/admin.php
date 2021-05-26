<?php
echo "<br/> Hey admin " . $_SESSION['admin_name'] . ". You are logged in.";
require_once(LOG_OUT);
?>

<?php
$number = 0;

?>
<!-- <?php foreach ($artist as $artistitem) : ?>
	<?php $path = BASE_PATH . "/artist/viewdetail/" . $artistitem['Artist']['id'] . "/" . strtolower(str_replace(" ", "-", $artistitem['Artist']['name'])); ?>
	<a class="big" href="<?php echo  $path ?>">
	<span class="artist">
	<?php echo ++$number ?>
	<?php echo $artistitem['Artist']['name'] ?>
	</span>
	</a><br/>
<?php endforeach ?> -->
<div class="admin-container">
	<a href=<?php echo USER_VIEWALL ?>>
		<div class="admin-choice admin-user-choice">
			<img class="admin-choice-icon" src=<?php echo BASE_PATH . DS . "public" . DS . "assets" . DS . "img" . DS . "user.svg" ?> />
			<h3 class="admin-choice-text"> MANAGE USERS </h3>
		</div>
	</a>
	<a href=<?php echo ADD_ARTIST ?>>
		<div class="admin-choice admin-user-choice">
			<img class="admin-choice-icon" src=<?php echo BASE_PATH . DS . "public" . DS . "assets" . DS . "img" . DS . "microphone.svg" ?> />
			<h3 class="admin-choice-text"> ADD ARTISTS </h3>
		</div>
	</a>
	<a href=<?php echo ADD_SONG ?>>
		<div class="admin-choice admin-user-choice">
			<img class="admin-choice-icon" src=<?php echo BASE_PATH . DS . "public" . DS . "assets" . DS . "img" . DS . "movie.svg" ?> />
			<h3 class="admin-choice-text"> ADD SONGS </h3>
		</div>
	</a>
</div>
<div >
	<img class="admin-image" src=<?php echo BASE_PATH . DS . "public" . DS . "assets" . DS . "img" . DS . "admin.svg" ?> />
</div>