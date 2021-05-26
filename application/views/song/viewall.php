<h1>Vieww all</h1>
<?php 
$number = 0;

?>
<?php foreach ($song as $songitem):?>
	<?php $path = BASE_PATH."/song/viewdetail/".$songitem['Song']['id']."/".strtolower(str_replace(" ","-",$songitem['Song']['name'])); ?>
	<a class="big" href="<?php echo  $path?>">
	<span class="song">
	<?php echo ++$number?>
	<?php echo $songitem['Song']['name']?>
	</span>
	</a>
	<button><a href= <?php echo BASE_PATH . "/song/delete/" . $songitem['song']['id']. "/"?>>Delete</a></button><br/>	
<?php endforeach?>
<?php include(HOME_PAGE)?>



