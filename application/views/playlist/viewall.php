<h1>view all playlist</h1>
<?php require_once(HOME_PAGE);?>
<?php if($is_user): ?>
    <h1>My playlist</h1>
    <?php $number = 0;?>
    <?php foreach ($playlist as $playlistitem):?>
        <!-- <?php $path = BASE_PATH."/playlist/viewdetail/".$playlistitem['Playlist']['id']."/".strtolower(str_replace(" ","-",$playlistitem['Playlist']['name'])); ?> -->
        <a class="big" href="<?php echo  $path?>">
        <span class="playlist">
        <?php echo ++$number?>
        <?php echo $playlistitem['Playlist']['name']?>
        </span>
        </a>
        <button>Delete</button><br/>
    <?php endforeach ?>
<?php else: ?>
    <h1>You don't have permission</h1>
<?php endif ?>
