<h1>Vieww all</h1>
<?php $number = 0?>
<?php foreach ($artist as $artistitem):?>
	<a class="big" href="<?php echo "./artist/viewdetail"."/".$artistitem['Artist']['id']?>/<?php echo strtolower(str_replace(" ","-",$artistitem['Artist']['name']))?>">
	<span class="artist">
	<?php echo ++$number?>
	<?php echo $artistitem['Artist']['name']?>
	</span>
	</a><br/>
<?php endforeach?>