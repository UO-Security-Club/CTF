<?php
session_start();

if (isset($_SESSION['user_name']) === false) {
	exit("<p>You must be logged in to view this page</p><br><a href='http://ctf.uosec.info'>Login</a>");
}
?>
