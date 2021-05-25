<h1><?php echo $song['Song']['name']?></h1>
<p>Ca sĩ: 
<?php
    if(!empty($song['Artist'])){
       foreach($song['Artist'] as $element){
           if (sizeof($song['Artist']) == 1){
            echo $element['Artist']['name'];
           }
           else{
            echo $element['Artist']['name'].",";
           }
          
       }
    }
?>

</p>
<p>Thể loại: <?php echo $song['Genre']['name']?></p>
<p>Quốc gia: <?php echo $song['Country']['name']?></p>
<p>image:</p>
<p>Lyrics: </p>
<form action=<?php echo PATH_SONG_VIEWALL?>>
<input type="submit" value="Back to Songs">
</form>
<?php include(HOME_PAGE);?>