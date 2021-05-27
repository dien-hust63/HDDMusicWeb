<h1>view detail</h1>
<?php foreach ($playlist_name as $playlistitem):?>
    <h4><?php $playlistname = $playlistitem['Playlist']['name']; 
                $playlistid = $playlistitem['Playlist']['id'];
                echo $playlistname; break;?></h4>
<?php endforeach ?>
<br/>
<button><a href=<?php echo BASE_PATH . DS . 'playlist' . DS . 'addsong' . DS . $playlistid?>>Add song</a></button>
<br>
<?php $number = 0?>
<?php
    $song_name = [];
    $song_id = [];
    foreach($playlist as $key => $value) {
        foreach($value as $value1 => $value2){
            if($value1 == 'song_name') {
                array_push($song_name, $value2);
            } else if ($value1 == 'song_id'){
                array_push($song_id, $value2);
            }
        }
    }
?>

<?php for($i = 0; $i < sizeof($song_id); $i++):?>
        <?php if(strlen($song_id[$i]) == 0) break;?>
		<?php $path = BASE_PATH."/song/viewdetail/".$song_id[$i]."/".strtolower(str_replace(" ","-",$song_name[$i])); ?>
		<a class="big" href="<?php echo  $path?>">
		<span class="playlist-detail">
		<?php echo ++$number?>
		<?php echo $song_name[$i]?>
		</span>
		</a>
        <button><a href=<?php echo BASE_PATH . DS . 'playlist' . DS . 'deletesong' . DS . $playlistid . DS . $song_id[$i]?>>Delete</a></button><br/>
<?php endfor?>
