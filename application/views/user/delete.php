<h1>All Users</h1>
<?php
$number = 0;

?>

<ul class="task-items">
	<?php if (isset($_SESSION['admin_login_status']) and $_SESSION['admin_login_status'] == 1) : ?>
		<?php foreach ($user as $useritem) : ?>
			<?php $path = BASE_PATH . "/user/viewdetail/" . $useritem['User']['user_id'] . "/" . strtolower(str_replace(" ", "-", $useritem['User']['user_name'])); ?>
			<li class="item">
				<div class="song-info">
					<a class="song-name" class="big" href="<?php echo  $path ?>">
						<span class="song">
							<?php echo $useritem['User']['user_name'] ?>
						</span>
					</a>
					<button class="btn-playlist"><a href=<?php echo BASE_PATH . "/user/delete/" . $useritem['User']['user_id'] . "/" ?>>Delete</a></button><br />
				</div>
			</li>

		<?php endforeach ?>
	<?php else : ?>
		<?php foreach ($user as $useritem) : ?>
			<li class="item">
				<div class="song-info">
					<a class="song-name" class="big" href="<?php echo  $path ?>">
						<span class="song">
							<?php echo $useritem['User']['user_name'] ?>
						</span>
					</a>
				</div>
			</li>
		<?php endforeach ?>
	<?php endif ?>
</ul>
<?php require_once(HOME_PAGE) ?>