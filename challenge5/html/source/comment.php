<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if( array_key_exists( "comment", $_GET ) && $_GET[ 'comment' ] != NULL ) {
	// Feedback for end user
	$cmt_str = $_GET[ 'comment' ];
	if (strlen($cmt_str) > 80) {
		$cmt_str = substr($cmt_str, 0, 80);
	}
	//$html .= '<pre>Comment: ' . $cmt_str . '</pre>';
	if(isset($_SESSION['Comments']) === false) {
        	$cmt_array = array('Initial Comment');
        	$_SESSION['Comments'] = $cmt_array;
	}
	if(count($_SESSION['Comments']) < 5) {
		array_push($_SESSION['Comments'], $cmt_str);
	}
}

if( array_key_exists( "clear", $_GET ) && $_GET[ 'clear' ] != NULL ) {
	if ($_GET['clear'] == "True"){
		$cmt_array = array('Initial Comment');
        	$_SESSION['Comments'] = $cmt_array;
	}
}

elseif(isset($_SESSION['Comments']) === false) {
        $cmt_array = array('Initial Comment');
        $_SESSION['Comments'] = $cmt_array;
}

$html .= '<br><b>Comments:</b><br>';
foreach($_SESSION['Comments'] as $key=>$value) {
        $html .= 'Post #'.$key.'<br><li>'.$value.'<br>';
}

?>
