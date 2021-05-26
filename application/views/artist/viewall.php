<h1>Vieww all</h1>
<?php 
$number = 0;

?>
<?php foreach ($artist as $artistitem):?>
	<?php $path = BASE_PATH."/artist/viewdetail/".$artistitem['Artist']['id']."/".strtolower(str_replace(" ","-",$artistitem['Artist']['name'])); ?>
	<form id = "artist_form">
		<a class="big" href="<?php echo  $path?>">
		<span class="artist">
		<?php echo ++$number?>
		<?php echo $artistitem['Artist']['name']?>
		</span>
		</a>
		<input type="button" value="Delete" onclick="deleteArtist(<?php $artist['Artist']['id']?>)"/>	
	</form>
<?php endforeach?>
<?php require_once(HOME_PAGE)?>
<script>
</script>