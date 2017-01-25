<?php
session_start();
//echo "Account: ";
if (isset($_SESSION['user_name']) === false) {
	//echo '<script>document.write(document.cookie)</script>';
	exit("<p>You must be logged in to view this page</p><br><a href='http://ec2-35-167-126-129.us-west-2.compute.amazonaws.com/'>Login</a>");
	//echo 'GUEST';
}
?>
