<h1><?php echo $artist['Artist']['name']?></h1>
<p>tuoi: <?php echo $artist['Artist']['age']?></p>
<p>Quốc gia: <?php echo $artist['Country']['name']?></p>

<h2>List of songs</h2>
<?php
    $count = 0;
    if(!empty($artist['Song'])){
       foreach($artist['Song'] as $element){
           $count ++;
           echo "<div >".$count.".".$element['Song']['name']."</div>";
       }
    }
    else{
        echo "Have no songs in database";
    }
?>
<form action=<?php echo PATH_ARTIST_VIEWALL?>  method="post">
<input type="submit" value="Back to Artist"></form>
<?php include(HOME_PAGE);?>
