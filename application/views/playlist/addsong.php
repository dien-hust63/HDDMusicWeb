<h1>addsong</h1>
<h1>Vieww all</h1>
<?php 
$number = 0;

?>
<?php if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1):?>
	<?php foreach ($song as $songitem):?>
		<?php $path = BASE_PATH."/song/viewdetail/".$songitem['Song']['id']."/".strtolower(str_replace(" ","-",$songitem['Song']['name'])); ?>
		<a class="big" href="<?php echo  $path?>">
		<span class="song">
		<?php echo ++$number?>
		<?php echo $songitem['Song']['name']?>
		</span>
		</a>
		<button><a href= <?php echo BASE_PATH . DS . 'playlist'. DS . 'addsong' . DS . $playlist[0]['Playlist']['id']. DS .$songitem['Song']['id']. '/'?>>Add</a></button><br/>	
	<?php endforeach?>
<?php else:?>
    <p>You are not a user. Fuck you broooooo.</p>
<?php endif?>
<?php include(HOME_PAGE)?>



