<?php

if ($login->isUserLoggedIn() == 1 || $login->isAdminLoggedIn() == 1) {
    include("logged_in.php");
} else {
    include("not_logged_in.php");
}
?>


