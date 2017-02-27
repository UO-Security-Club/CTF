<?php
	//include_once('source/check_session.php');
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(isset($_SESSION['myCookies'])) {
		$ret_html = "<b>Your stolen cookies:</b><br>";
		$ret_html .= $_SESSION['myCookies'];
		$ret_html .= "<br><br>Back to <a href='/index.php'>comments page</a>";
		echo $ret_html;
		
	} else {
		$ret_html = "No cookies have been stolen\n";
		$ret_html .= "<br><br>Back to <a href='/index.php'>comments page</a>";
                echo $ret_html;
	}
?>
