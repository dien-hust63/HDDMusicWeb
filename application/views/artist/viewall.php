<h1>Vieww all</h1>
<?php 
$number = 0;

?>
<?php foreach ($artist as $artistitem):?>
	<?php $path = BASE_PATH."/artist/viewdetail/".$artistitem['Artist']['id']."/".strtolower(str_replace(" ","-",$artistitem['Artist']['name'])); ?>
	<a class="big" href="<?php echo  $path?>">
	<span class="artist">
	<?php echo ++$number?>
	<?php echo $artistitem['Artist']['name']?>
	</span>
	</a>
	<button><a href= <?php echo BASE_PATH . "/artist/delete/" . $artistitem['Artist']['id']. "/"?>>Delete</a></button><br/>
<?php endforeach?>
<?php require_once(HOME_PAGE)?>