<?php
	include("bank_account.php");

	$content = "<html>";
	$content .= "<head><h2>Welcome to Bank.com!</h2></head>";
	$content .= "<body>";
	$content .= $bank_html;
	$content .= "</body>";
	$content .= "</html>";

	echo $content;
?>
