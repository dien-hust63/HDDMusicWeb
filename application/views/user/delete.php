<h1>view all user</h1>
<?php 
$number = 0;

?>
<?php foreach ($user as $userItem):?>
	<?php $path = BASE_PATH."/user/viewdetail/".$userItem['User']['user_id']."/".strtolower(str_replace(" ","-",$userItem['User']['user_name'])); ?>
	<a class="big" href="<?php echo  $path?>">
	<span class="user">
	<?php echo ++$number?>
	<?php echo $userItem['User']['user_name']?>
	</span>
	</a>
	<button><a href= <?php echo BASE_PATH . "/user/delete/" . $usersitem['User']['id']. "/"?>>Delete</a></button><br/>
<?php endforeach?>
<?php require_once(HOME_PAGE)?>