<h1>Vieww all</h1>
<?php $number = 0?>
<?php foreach ($artist as $artistitem):?>
	<a class="big" href="#">
	<span class="artist">
	<?php echo ++$number?>
	<?php echo $todoitem['Artist']['name']?>
	</span>
	</a><br/>
<?php endforeach?>