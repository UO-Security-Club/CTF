<?php
session_start();
//echo "Account: ";
if (isset($_SESSION['user_name'])) { 
	$usr = $_SESSION['user_name'];
} else {
	exit("<p>You must be logged in to view this page</p><br><a href='index.php'>Login</a></html>");
}
$nav_html = "<ul>";
$welcome = "<li><a href='welcome.php'>Home</a></li>";
$scores = "<li><a href='scores.php'>Scores</a></li>";
$challenges = "<li><a href='challenges.php'>Challenges</a></li>";
$logout = "<li><a href='index.php?logout'>Logout</a></li>";
$account = "<li class='account'><a href='#'>Account: " . $usr . "</a></li>";

//$nav_html += . $welcome . $scores . $challenges . $logout . $account . "</ul>";
echo '<link rel="stylesheet" type="text/css" href="css/navbar.css">';
echo $nav_html;
echo $welcome;
echo $scores;
echo $challenges;
echo $logout;
echo $account;
echo "</ul>";
//echo "Account: " . $usr;
?>
