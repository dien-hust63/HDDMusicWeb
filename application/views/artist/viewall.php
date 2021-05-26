<?php
$number = 0;

?>
<h1>Artists on hustmp3:</h1>
<ul>
	<?php foreach ($artist as $artistitem) : ?>
		<?php $path = BASE_PATH . "/artist/viewdetail/" . $artistitem['Artist']['id'] . "/" . strtolower(str_replace(" ", "-", $artistitem['Artist']['name'])); ?>
		<?php $imagePath = BASE_PATH."/public/assets/img/".$artistitem['Artist']['avatar']; ?>
		<li class="item">
			<div class="song-image" style="background-image: url(<?php echo $imagePath ?>)">
			</div>
			<div class="song-info">
				<a class="song-name" class="big" href="<?php echo  $path ?>">
					<span class="song">
						<?php echo $artistitem['Artist']['name'] ?>
					</span>
				</a>
			</div>
			<button><a href=<?php echo BASE_PATH . "/artist/delete/" . $artistitem['Artist']['id'] . "/" ?>>Delete</a></button><br />
		</li>
		<!-- <a class="big" href="<?php echo  $path ?>">
			<span class="artist">
				<?php echo ++$number ?>
				<?php echo $artistitem['Artist']['name'] ?>
			</span>
		</a> -->
	<?php endforeach ?>
</ul>
<?php include(HOME_PAGE) ?>
