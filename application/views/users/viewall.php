<h1>view all user</h1>
<?php 
$number = 0;

?>
<?php foreach ($users as $useritem):?>
	<?php $path = BASE_PATH."/users/viewdetail/".$useritem['Users']['user_id']."/".strtolower(str_replace(" ","-",$useritem['Users']['user_name'])); ?>
	<a class="big" href="<?php echo  $path?>">
	<span class="user">
	<?php echo ++$number?>
	<?php echo $useritem['Users']['user_name']?>
	</span>
	</a>
	<button><a href= <?php echo BASE_PATH . "/users/delete/" . $useritem['Users']['user_id']. "/"?>>Delete</a></button><br/>
<?php endforeach?>
<?php require_once(HOME_PAGE)?>