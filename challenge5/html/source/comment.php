<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function check_tmp_file() {
	//check if user has existing tmp file for this challenge
	if(isset($_SESSION['tmpXSSfile']) === false) {
		//if not, generate one and set the session var
		$path = '/var/www/challenge5/html/xss_tmp/';
		$prefix = str_shuffle($_COOKIE['PHPSESSID']);
		$filename = $path . $prefix . 'XSS-BOT.php';
		$_SESSION['tmpXSSfile'] = $filename;
	} else {
		$filename = $_SESSION['tmpXSSfile'];
	}
	return $filename;
}

function write_comments($filename) {
	$page .= "<?php\n";
	$page .= "if (session_status() == PHP_SESSION_NONE) {\n";
	$page .= "\tsession_start;\n";
	$page .= "}\n";
	$page .= "?>\n";

	$page .= '<html><br><b>Comments:</b><br>';
        foreach($_SESSION['Comments'] as $key=>$value) {
		$page .= 'Post #'.$key.'<br><li>'.$value.'<br>';
        }
        $page .= "</html>\n";
        $fh = fopen($filename, "w");
        fwrite($fh, $page);
        fclose($fh);
}

if( array_key_exists( "comment", $_GET ) && $_GET[ 'comment' ] != NULL ) {
	// Feedback for end user
	$cmt_str = $_GET[ 'comment' ];
	if (strlen($cmt_str) > 80) {
		$cmt_str = substr($cmt_str, 0, 80);
	}
	$js = 'script>';
	$cmt_str = str_replace($js, "nope>", $cmt_str);
	//$html .= '<pre>Comment: ' . $cmt_str . '</pre>';
	if(isset($_SESSION['Comments']) === false) {
        	$cmt_array = array('Initial Comment');
        	$_SESSION['Comments'] = $cmt_array;
	}
	if(count($_SESSION['Comments']) < 5) {
		array_push($_SESSION['Comments'], $cmt_str);
	}

	$filename = check_tmp_file();
	write_comments($filename);

	//$page .= '<html><br><b>Comments:</b><br>';
	//foreach($_SESSION['Comments'] as $key=>$value) {
        //	$page .= 'Post #'.$key.'<br><li>'.$value.'<br>';
	//}
	//$page .= '</html>';
	//$fh = fopen($filename, "w");
	//fwrite($fh, $page);
	//fclose($fh);
	//$command = 'phantomjs --ignore-ssl-errors=true --local-to-remote-url-access=true --web-security=false --ssl-protocol=any /var/www/challenge5/xss-bot.js';
	//$cky = escapeshellcmd($_COOKIE['PHPSESSID']);
	//unlink($filename);
}

if( array_key_exists( "clear", $_GET ) && $_GET[ 'clear' ] != NULL ) {
	if ($_GET['clear'] == "True"){
		$cmt_array = array('Initial Comment');
        	$_SESSION['Comments'] = $cmt_array;
		write_comments(check_tmp_file());
	}
}

elseif(isset($_SESSION['Comments']) === false) {
        $cmt_array = array('Initial Comment');
        $_SESSION['Comments'] = $cmt_array;
	write_comments(check_tmp_file());
}

$html .= '<br><b>Comments:</b><br>';
foreach($_SESSION['Comments'] as $key=>$value) {
        $html .= 'Post #'.$key.'<br><li>'.$value.'<br>';
}

?>
