<?php
    echo "<br/> Hey admin". $_SESSION['admin_name'] . ". You are logged in.
    Try to close this browser tab and open it again. Still logged in!";
	require_once(LOG_OUT);
?>
<h1>ADMIN PAGE</h1>
<h3>This list of artists</h3>

<?php
$number = 0;

?>
<?php foreach ($artist as $artistitem):?>
	<?php $path = BASE_PATH."/artist/viewdetail/".$artistitem['Artist']['id']."/".strtolower(str_replace(" ","-",$artistitem['Artist']['name'])); ?>
	<a class="big" href="<?php echo  $path?>">
	<span class="artist">
	<?php echo ++$number?>
	<?php echo $artistitem['Artist']['name']?>
	</span>
	</a><br/>
<?php endforeach?>
<button><a href=<?php echo USER_VIEWALL?>>All users</a></button>
<br/>
<button><a href=<?php echo ARTIST_VIEWALL?>>All artists</a></button>
<br/>
<button><a href=<?php echo SONG_VIEWALL?>>All songs</a></button>