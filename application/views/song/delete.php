<h1>Vieww all</h1>
<?php 
$number = 0;
?>
<?php if (isset($_SESSION['admin_login_status']) AND $_SESSION['admin_login_status'] == 1):?>
<?php foreach ($song as $songitem):?>
	<?php $path = BASE_PATH."/song/viewdetail/".$songitem['Song']['id']."/".strtolower(str_replace(" ","-",$songitem['Song']['name'])); ?>
    <a class="big" href="<?php echo  $path?>">
    <span class="song">
    <?php echo ++$number?>
    <?php echo $songitem['Song']['name']?>
    </span>
    <button><a href= <?php echo BASE_PATH . "/song/delete/" . $songitem['Song']['id']. "/"?>>Delete</a></button><br/>	
<?php endforeach?>
<?php else:?>
    <p>You are not an admin. Fuck you broooooo.</p>
<?php endif?>
<?php require_once(HOME_PAGE)?>