<?php
$number = 0;

?>
<div style="width:30%">
	<form id ="search_artist_form" style="margin-top: 3px;">
		<input type="text" placeholder="Nhập tên tác giả" id="search_artist" onkeyup="showResult(this.value)">
		</input>
		<div id="artist_live_search" ></div>
	</form>
</div>
<h1>Artists on hustmp3:</h1>
<ul>
	<?php if (isset($_SESSION['admin_login_status']) AND $_SESSION['admin_login_status'] == 1):?>
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
			<button class="btn-delete"><a style=":text-decoration: none;" href=<?php echo BASE_PATH . "/artist/delete/" . $artistitem['Artist']['id'] . "/" ?>>Delete</a></button><br />
		</li>
	<?php endforeach ?>
	<?php else:?>
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
		</li>
	<?php endforeach ?>		
	<?php endif?>
</ul>
<?php include(HOME_PAGE) ?>
<script>
	function showResult(str) {
	console.log("alo");
	if (str.length==0) {
		document.getElementById("artist_live_search").innerHTML="";
		document.getElementById("artist_live_search").style.border="0px";
		return;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
		document.getElementById("artist_live_search").innerHTML=this.responseText;
		document.getElementById("artist_live_search").style.border="1px solid #A5ACB2";
		document.getElementById("artist_live_search").style.width="65%";
		}
	}
	xmlhttp.open("POST","http://localhost/HDDMusicWeb/artist/search/"+ str);
	xmlhttp.send();
	}
</script>