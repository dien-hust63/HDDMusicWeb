<h1>view all playlist</h1>
<?php require_once(HOME_PAGE);?>
<?php if (isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 1)):?>
    <h1>My playlist</h1>
    <?php $number = 0;?>
    <button><a href=<?php echo BASE_PATH . DS . 'playlist' . DS . 'add'?>>Add playlist</a></button><br/>
    <?php foreach ($playlist as $playlistitem):?>
        <?php $path = BASE_PATH."/playlist/viewdetail/".$playlistitem['Playlist']['id']."/".strtolower(str_replace(" ","-",$playlistitem['Playlist']['name'])); ?>
        <a class="big" href="<?php echo  $path?>">
        <span class="playlist">
        <?php echo ++$number?>
        <?php echo $playlistitem['Playlist']['name']?>
        </span>
        </a>
        <button><a href= <?php echo BASE_PATH . "/playlist/delete/" . $playlistitem['Playlist']['id']. "/"?>>Delete</a></button><br/>	 
    <?php endforeach ?>
<?php else: ?>
    <h1>You must sign in to access playlist</h1>
<?php endif ?>