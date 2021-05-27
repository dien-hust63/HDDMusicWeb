<?php
$number = 0;

?>
<h1>
	All songs available on hustmp3:
</h1>
<ul class="task-items">
	<?php if (isset($_SESSION['admin_login_status']) AND $_SESSION['admin_login_status'] == 1):?>
	<?php foreach ($song as $songitem) : ?>
		<?php $path = BASE_PATH . "/song/viewdetail/" . $songitem['Song']['id'] . "/" . strtolower(str_replace(" ", "-", $songitem['Song']['name'])); ?>
		<?php $imagePath = BASE_PATH."/public/assets/img/".$songitem['Song']['image'] ?>
		<li class="item">
			<div class="song-image" style="background-image: url(<?php echo $imagePath ?>)">
			</div>
			<div class="song-info">
				<a class="song-name" class="big" href="<?php echo  $path ?>">
					<span class="song">
						<?php echo $songitem['Song']['name'] ?>
					</span>
				</a>
				<?php if (!empty($songitem['Artist'])) : ?>
					<?php foreach ($songitem['Artist'] as $element) : ?>
						<?php $path = BASE_PATH . "/artist/viewdetail/" . $element['Artist']['id'] . "/" . strtolower(str_replace(" ", "-", $element['Artist']['name'])); ?>
						<a class="artist-name" href="<?php echo $path ?>"><?php echo $element['Artist']['name'] ?></a>
					<?php endforeach ?>
				<?php endif ?>
			</div>
			<button class="btn-delete"><a href=<?php echo BASE_PATH . "/song/delete/" . $songitem['Song']['id'] . "/" ?>>Delete</a></button><br />
		</li>
	<?php endforeach ?>
	<?php else:?>
		<?php foreach ($song as $songitem) : ?>
		<?php $path = BASE_PATH . "/song/viewdetail/" . $songitem['Song']['id'] . "/" . strtolower(str_replace(" ", "-", $songitem['Song']['name'])); ?>
		<?php $imagePath = BASE_PATH."/public/assets/img/".$songitem['Song']['image'] ?>
		<li class="item">
			<div class="song-image" style="background-image: url(<?php echo $imagePath ?>)">
			</div>
			<div class="song-info">
				<a class="song-name" class="big" href="<?php echo  $path ?>">
					<span class="song">
						<?php echo $songitem['Song']['name'] ?>
					</span>
				</a>
				<?php if (!empty($songitem['Artist'])) : ?>
					<?php foreach ($songitem['Artist'] as $element) : ?>
						<?php $path = BASE_PATH . "/artist/viewdetail/" . $element['Artist']['id'] . "/" . strtolower(str_replace(" ", "-", $element['Artist']['name'])); ?>
						<a class="artist-name" href="<?php echo $path ?>"><?php echo $element['Artist']['name'] ?></a>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</li>
	<?php endforeach ?>
	<?php endif?>
</ul>
<?php include(HOME_PAGE) ?>
