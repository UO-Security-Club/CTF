<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//$tmpFILEnoPATH;
$tmpPATH = '/var/www/challenge5/html/xss_tmp/';

function check_tmp_file() {
	//global $tmpFILEnoPATH;
	//check if user has existing tmp file for this challenge
	if(isset($_SESSION['tmpXSSfile']) === false) {
		//if not, generate one and set the session var
		$path = '/var/www/challenge5/html/xss_tmp/';
		$prefix = str_shuffle($_COOKIE['PHPSESSID']);
		//$tmpFILEnoPATH = $prefix . 'XSS-BOT.php';
		$filename = $path . $prefix . 'XSS-BOT.php';
		$_SESSION['tmpXSSfile'] = $filename;
	} else {
		$filename = $_SESSION['tmpXSSfile'];
	}
	//check if user has existing tmp text file for storing stolen cookies
	if(isset($_SESSION['tmpXSScookiefile']) === false) {
		$cookie_filename = $path . $prefix . 'XSS-COOKIE.txt';
		$_SESSION['tmpXSScookiefile'] = $cookie_filename;
	}

	return $filename;
}

function write_comments($filename) {
	$page .= "<?php\n";
	$page .= "if (session_status() == PHP_SESSION_NONE) {\n";
	$page .= "\tsession_start();\n";
	$page .= "\tsetcookie('Flag', 'UOSEC_filtersR2hard');\n";
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
	if(isset($_SESSION['stolen_cookies'])){
		$_SESSION['stolen_cookies'] = "";
	}
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

	//$command = 'phantomjs --ignore-ssl-errors=true --local-to-remote-url-access=true --web-security=false --ssl-protocol=any /var/www/challenge5/xss-bot.js '.$tmpFILEnoPATH;

	if(strcmp($_SESSION['user_name'], 'admin') == 0) {
		$fileNOpath = str_replace($tmpPATH, " ", $filename);
		$command = './run_xss-but.sh' . $fileNOpath;
		//echo $command;	
		$old_path = getcwd();
		chdir('/var/www/challenge5/');
		$output = shell_exec($command);
		chdir($old_path);
		if($output){
			$_SESSION['myCookies'] = $output;
			//echo $output;
		} else {
			echo $output;
			echo "Error: " . $status;
		}
		//unlink($filename);
	}
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
//$html = str_replace("SCRIPT>", "nope>", $html);
?>
