<?php

function loginStatus() {
	//Simple function to reference that checks the login status of a user
	//Returns 2 if user is a Guest
	//Returns 1 if account is authenticated
	//Returns 0 if user is neither and should be directed to login page
	if (isset($_SESSION['user_name'])) {
		$usrname = $_SESSION['user_name'];
		if (strcmp($usrname, "Guest") === 0) {
			return 2;
		}else{
			return 1;
		}
	} else {
		return 0;
	}
}

session_start();

if (isset($_SESSION['user_name'])) { 
	$usr = $_SESSION['user_name'];
} else {
	exit("<p>You must be logged in to view this page</p><br><a href='../index.php'>Login</a></html>");
}
$nav_html = "<ul class='nav'>";
//$welcome = "<li class='nav'><a href='../views/welcome.php'>Home</a></li>";
$scores = "<li class='nav'><a href='../views/scores.php'>Scores</a></li>";
$challenges = "<li class='nav'><a href='../views/challenges.php'>Challenges</a></li>";
$logout = "<li class='nav'><a href='../index.php?logout'>Logout</a></li>";
$account = "<li class='account'><a href='#'>Account: " . $usr . "</a></li>";

echo '<link rel="stylesheet" type="text/css" href="../css/navbar.css">';
echo $nav_html;
//echo $welcome;
echo $scores;
echo $challenges;
echo $logout;
echo $account;
echo "</ul>";

?>
