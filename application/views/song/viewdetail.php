<h1><?php echo $song['Song']['name']?></h1>
<img src=<?php echo BASE_PATH.DS."public".DS."assets".DS."img".DS.$song['Song']['image'] ?> alt="<?php echo $song['Song']['name'] ?>" style="width: 300px; height:400px;">
<p>Ca sĩ: 
<?php if(!empty($song['Artist'])): ?>
<?php foreach($song['Artist'] as $element): ?>
<?php $path = BASE_PATH."/artist/viewdetail/".$element['Artist']['id']."/".strtolower(str_replace(" ","-",$element['Artist']['name'])); ?>
<a href="<?php echo $path ?>"><?php echo $element['Artist']['name'] ?></a>

<?php endforeach ?>
<?php endif ?>

</p>

<p>Bài hát : 
<audio controls>
  <source src=<?php echo BASE_PATH.DS."public".DS."assets".DS."music".DS.$song['Song']['link'] ?> type="audio/mpeg">
Your browser does not support the audio element.
</audio>
</p>
<p>Thể loại: <?php echo $song['Genre']['name']?></p>
<p>Quốc gia: <?php echo $song['Country']['name'];?></p>

