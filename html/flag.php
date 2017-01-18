<?php
session_start();
echo "Welcome: ";
if (isset($_SESSION['user_name'])) { 
	$usr = $_SESSION['user_name'];
} else {
	$usr = "Guest";
}

echo $usr;

if(strcmp($usr, "admin") == 0) {
	echo " Congrats! The flag is: UOSEC_cookieMONsterrr";
} else {
	echo "Sorry, no flag for you";
}

?>
