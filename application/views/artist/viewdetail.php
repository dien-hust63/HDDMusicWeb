<h1><?php echo $artist['Artist']['name']?></h1>
<img src=<?php echo BASE_PATH.DS."public".DS."assets".DS."img".DS.$artist['Artist']['avatar'] ?> alt= "<?php echo $artist['Artist']['name']?>" style="width: 300px; height:400px;">
<p>tuoi: <?php echo $artist['Artist']['age']?></p>
<p>Quốc gia: <?php echo $artist['Country']['name']?></p>

<h2>List of songs</h2>
<?php  $count = 0; ?>
<?php if(!empty($artist['Song'])): ?>
<?php foreach($artist['Song'] as $element): ?>   
      
<?php 
    $count ++;      
    $song_path = BASE_PATH."/song/viewdetail/".$element['Song']['id']."/".strtolower(str_replace(" ","-",$element['Song']['name'])); 
?>

<form action=<?php echo PATH_ARTIST_VIEWALL?>  method="post">
<input type="submit" value="Back to Artist"></form>
<?php include(HOME_PAGE);?>

<div>
    <span><?= $count ?> .</span>
    <a href= <?= $song_path ?> > <?= $element['Song']['name'] ?> </a>
    <audio controls>
        <source src=<?php echo BASE_PATH.DS."public".DS."assets".DS."music".DS.$element['Song']['link'] ?> type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    
</div>
<?php endforeach; ?>
<?php else: ?>
<div>Have no song in database</div>
<?php endif ?>

