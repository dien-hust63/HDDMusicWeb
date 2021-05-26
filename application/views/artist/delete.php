<?php 
$number = 0;
?>
<?php if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1):?>
<?php foreach ($artist as $artistitem):?>
	<?php $path = BASE_PATH."/artist/viewdetail/".$artistitem['Artist']['id']."/".strtolower(str_replace(" ","-",$artistitem['Artist']['name'])); ?>
    <a class="big" href="<?php echo  $path?>">
    <span class="artist">
    <?php echo ++$number?>
    <?php echo $artistitem['Artist']['name']?>
    </span>
    <button><a href= <?php echo BASE_PATH . "/artist/delete/" . $artistitem['Artist']['id']. "/"?>>Delete</a></button><br/>	
<?php endforeach?>
<?php else:?>
    <p>You are not an admin. Fuck you broooo.</p>
<?php endif?>
<?php require_once(HOME_PAGE)?>