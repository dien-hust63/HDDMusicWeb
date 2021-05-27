<?php
echo "<br/> <h4>Hey admin " . $_SESSION['admin_name'] . ". You are logged in.</h4>";
?>
</br>
<?php
$number = 0;

?>
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