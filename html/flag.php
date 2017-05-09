<?php
session_start();

if ($_COOKIE['PHPSESSID'] == "91u0v2dg3050iqfb5e9lcrjfm5") {
	echo "Welcome Admin,<br>Congrats! The flag is: UOSEC_cookieMONsterrr";
} else {
	echo "<br>Sorry, no flag for you";
}

?>
