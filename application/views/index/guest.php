<h1 class="front-text">Welcome to HustMP3</h1>
<h3 class="sub-header">Choose your favorite artist and enjoy the music</h3>

<?php
$number = 0;

?>
<div class="artist-list">
	<?php foreach ($artist as $artistitem) : ?>
		<?php $path = BASE_PATH . "/artist/viewdetail/" . $artistitem['Artist']['id'] . "/" . strtolower(str_replace(" ", "-", $artistitem['Artist']['name'])); ?>
		<a class="big" href="<?php echo  $path ?>">
			<div class="artist" style="background-image: url(<?php echo BASE_PATH."/public/assets/img/".$artistitem['Artist']['avatar'] ?>)">
				<!--
					<?php echo ++$number ?> 
				<?php echo $artistitem['Artist']['name'] ?>
				-->
			</div>
		</a>
	<?php endforeach ?>
</div>