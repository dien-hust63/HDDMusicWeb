<h1>Add Song</h1>
<?php 
$number = 0;

?>
<?php if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1):?>
	<?php foreach ($song as $songitem):?>
		<?php $path = BASE_PATH."/song/viewdetail/".$songitem['Song']['id']."/".strtolower(str_replace(" ","-",$songitem['Song']['name'])); ?>
		<li class="item">
			<div class="song-image" style="background-image: url(<?php echo $imagePath ?>)">
			</div>
			<div class="song-info">
				<a class="song-name" class="big" href="<?php echo  $path ?>">
					<span class="song">
						<?php echo $songitem['Song']['name'] ?>
					</span>
				</a>
			</div>
		<button class="btn-delete"><a href= <?php echo BASE_PATH . DS . 'playlist'. DS . 'addsong' . DS . $playlist_id. DS .$songitem['Song']['id']. '/'?>>ADD</a></button>
		</li>
	<?php endforeach?>
<?php else:?>
    <p>You are not a users</p>
<?php endif?>
<?php include(HOME_PAGE)?>




