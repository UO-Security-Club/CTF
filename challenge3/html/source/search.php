<?php

if( array_key_exists( "search", $_GET ) && $_GET[ 'search' ] != NULL ) {
	// Feedback for end user
	$srch_str = $_GET[ 'search' ];
	if (strlen($srch_str) > 50) {
		$srch_str = substr($srch_str, 0, 50);
	}
	$html .= '<pre>Database returned 0 Results For: ' . $srch_str . '</pre>';
}

?>
