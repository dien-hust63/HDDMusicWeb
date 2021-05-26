<?php
if (isset($_SESSION['user_login_status']) || isset($_SESSION['admin_login_status'])) {
	if ($_SESSION['user_login_status'] == 1) {
		include('guest.php');
	} else if ($_SESSION['admin_login_status'] == 1) {
		include('admin.php');
	}
} else {	
	include('guest.php');
}
?>
