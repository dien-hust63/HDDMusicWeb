<?php require_once(HOME_PAGE);?>
<?php if (isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 1)):?>
    <h1>My playlist</h1>
    <?php $number = 0;?>
    <button><a class="add-btn" href=<?php echo BASE_PATH . DS . 'playlist' . DS . 'add'?>>Add playlist</a></button><br/>
    <?php foreach ($playlist as $playlistitem):?>
        <?php $path = BASE_PATH."/playlist/viewdetail/".$playlistitem['Playlist']['id']."/".strtolower(str_replace(" ","-",$playlistitem['Playlist']['name'])); ?>
        <li class="item">
			<div class="song-info">
				<a class="song-name" class="big" href="<?php echo  $path ?>">
					<span class="song">
						<?php echo $playlistitem['Playlist']['name'] ?>
					</span>
				</a>
                <button class="btn-playlist"><a href=<?php echo BASE_PATH . "/playlist/delete/" . $playlistitem['Playlist']['id'] . "/" ?>>Delete</a></button><br />
			</div>
		</li>
    <?php endforeach ?>
<?php else: ?>
    <h1>You must sign in to access playlist</h1>
<?php endif ?>
