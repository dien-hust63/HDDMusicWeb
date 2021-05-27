<h1>Vieww all</h1>
<?php 
$number = 0;
?>
<h1>My playlist</h1>
<button><a href=<?php echo BASE_PATH . DS . 'playlist' . DS . 'add'?>>Add playlist</a></button><br/>
<?php foreach ($playlist as $playlistitem):?>
	<?php $path = BASE_PATH."/playlist/viewdetail/".$playlistitem['Playlist']['id']."/".strtolower(str_replace(" ","-",$playlistitem['Playlist']['name'])); ?>
    <a class="big" href="<?php echo  $path?>">
    <span class="playlist">
    <?php echo ++$number?>
    <?php echo $playlistitem['Playlist']['name']?>
    </span>
    <button><a href= <?php echo BASE_PATH . "/playlist/delete/" . $playlistitem['Playlist']['id']. "/"?>>Delete</a></button><br/>	
<?php endforeach?>
<?php require_once(HOME_PAGE)?>