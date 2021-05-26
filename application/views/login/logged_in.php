<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<?php
$name;
if ($login->userName() != "") {
    $name = $login->userName();
} else if ($login->adminName() != "") {
    $name = "admin " . $login->adminName();
} 
?>
Hey, <?php echo $name; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in!<br/>
<?php include(LOG_OUT);?>
