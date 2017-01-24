<?php
//session_start();
include_once('source/check_session.php');

if( isset($_SERVER['HTTP_REFERER'])) {
	$refer = $_SERVER['HTTP_REFERER'];
	if(strpos($refer, 'http://ec2-35-167-126-129.us-west-2.compute.amazonaws.com:5031/?search') === false) {
		exit("<br>Nice try, you sneaky snake...");
	}
} else {
	exit("<br>Nice try, you sneaky snake...");
}

if( array_key_exists( "cookie", $_GET ) && $_GET[ 'cookie' ] != NULL ) {
	$cookie_str = $_GET[ 'cookie' ];
	echo "Recieved Cookie:<br>".$cookie_str;
	//echo $_COOKIE['PHPSESSID'];
} else {
	exit("<br>you didn't send a cookie...");
}

if (substr_compare($cookie_str, $_COOKIE['PHPSESSID'], 10, strlen($_COOKIE['PHPSESSID'])) == 0) {
	//echo "Recieved Cookie: ".$cookie_str;
	echo "<br><br><b>Congrats, the flag is: UOSEC_cookiesRhighNcals";
} else {
	exit("<br>You'll get the right cookie one day...");
}

?>
