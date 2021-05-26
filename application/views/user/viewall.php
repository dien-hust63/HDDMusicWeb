<h1>view all user</h1>
<?php 
$number = 0;

?>
<?php foreach ($user as $useritem):?>
	<?php $path = BASE_PATH."/user/viewdetail/".$useritem['User']['user_id']."/".strtolower(str_replace(" ","-",$useritem['User']['user_name'])); ?>
	<a class="big" href="<?php echo  $path?>">
	<span class="user">
	<?php echo ++$number?>
	<?php echo $useritem['User']['user_name']?>
	</span>
	</a>
	<button><a href= <?php echo BASE_PATH . "/user/delete/" . $useritem['User']['user_id']. "/"?>>Delete</a></button><br/>
<?php endforeach?>
<?php require_once(HOME_PAGE)?>