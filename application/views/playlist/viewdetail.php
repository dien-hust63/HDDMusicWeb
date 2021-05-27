<?php foreach ($playlist_name as $playlistitem):?>
    <h4><?php $playlistname = $playlistitem['Playlist']['name']; 
                $playlistid = $playlistitem['Playlist']['id'];
                 break;?></h4>
<?php endforeach ?>
<h1><?php echo $playlistname;?></h1>

<button class="add-btn-form"><a href=<?php echo BASE_PATH . DS . 'playlist' . DS . 'addsong' . DS . $playlistid . DS ?>>Add song</a></button>
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
        <?php if(strlen($song_id[$i]) == 0 ) break;?>
		<?php $path = BASE_PATH."/song/viewdetail/".$song_id[$i]."/".strtolower(str_replace(" ","-",$song_name[$i])); ?>
        <li class="item">
			<div class="song-image" style="background-image: url(<?php echo $imagePath ?>)">
			</div>
			<div class="song-info">
				<a class="song-name" class="big" href="<?php echo  $path ?>">
					<span class="song">
						<?php echo $song_name[$i]?>
					</span>
				</a>
			</div>
            <button class="btn-delete"><a href=<?php echo BASE_PATH . DS . 'playlist' . DS . 'deletesong' . DS . $playlistid . DS . $song_id[$i]?>>Delete</a></button>
		</li>
<?php endfor?>
