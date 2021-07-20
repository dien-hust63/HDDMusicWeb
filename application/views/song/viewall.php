<?php
$number = 0;

?>
<div style="width:30%">
	<form id ="search_song_form" style="margin-top: 3px;">
		<input type="text" placeholder="Nhập tên bài hát" id="search_song" onkeyup="showResult(this.value)">
		</input>
		<div id="song_live_search" ></div>
	</form>
</div>

<h1>
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
<script>
	function showResult(str) {
	console.log("alo");
	if (str.length==0) {
		document.getElementById("song_live_search").innerHTML="";
		document.getElementById("song_live_search").style.border="0px";
		return;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
		document.getElementById("song_live_search").innerHTML=this.responseText;
		document.getElementById("song_live_search").style.border="1px solid #A5ACB2";
		document.getElementById("song_live_search").style.width="65%";
		}
	}
	xmlhttp.open("POST","http://localhost/HDDMusicWeb/song/search/"+ str);
	xmlhttp.send();
	}
</script>