<h1>Sign in page</h1> 
<?php

if ($login->isUserLoggedIn() == 1 || $login->isAdminLoggedIn() == 1) {
    include("logged_in.php");
} else {
    include("not_logged_in.php");
}
?>
<form method="post" action="../index">
<input type="submit" value="Back to Homepage"></form>


