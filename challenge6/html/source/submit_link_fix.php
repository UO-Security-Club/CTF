<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$tmpPATH = '/var/www/challenge6/html/csrf_tmp/';

function check_tmp_file() {
	//check if user has existing tmp file for this challenge
	if(isset($_SESSION['tmpCSRFfile']) === false) {
		//if not, generate one and set the session var
		$path = '/var/www/challenge6/html/csrf_tmp/';
		$prefix = str_shuffle($_COOKIE['PHPSESSID']);	
		$filename = $path . $prefix . 'CSRF-BOT.php';
		$_SESSION['tmpCSRFfile'] = $filename;
	} else {
		$filename = $_SESSION['tmpCSRFfile'];
	}

	return $filename;
}

function write_link($filename) {
	//This function creates/manages the php file that the 'admin' browser will read.
	//It reflects the comments page the user is posting to.
	$page .= "<?php\n";
	//Ensure that the 'admin' browser has a cookie set, then add the Flag cookie
	$page .= "if (session_status() == PHP_SESSION_NONE) {\n";
	$page .= "\tsession_start();\n";
	$page .= "\tsetcookie('Sally', 'itsallgood');\n";
	$page .= "}\n";
	$page .= "?>\n";
	$page .= '<html><br><b>Link:</b><br>';
	$page .= "<script>location.href='/" . $_SESSION['CSRFLink'] . "?isSally='+document.cookie;</script>";
        $page .= "</html>\n";

        $fh = fopen($filename, "w");
        fwrite($fh, $page);
        fclose($fh);
}

//check if request is for submitting a comment and ensure that it's not NULL
if( array_key_exists( "newLink", $_GET ) && $_GET[ 'newLink' ] != NULL ) {
	$link_str = $_GET[ 'newLink' ];

	//check that the comment is not longer than 80 characters
	if (strlen($link_str) > 80) {
		$link_str = substr($link_str, 0, 80);
	}

	//If user submits a comment and their session var has not been initialized, then initialize it
	if(isset($_SESSION['CSRFLink']) === false) {
		echo "session var not init";
        	$sess_link = "<broken>";
        	$_SESSION['CSRFLink'] = $sess_link;
	} else {
		$_SESSION['CSRFLink'] = $link_str;
	}

	$filename = check_tmp_file();
	//echo "Filename: " . $filename;
	write_link($filename);

	//get the user's tmp file name without the file path. This is sent as an argument to the bash scripts that dispatches the 'admin' browser.
	//This how the 'admin' browser knows which user's comment page to read.
	$fileNOpath = str_replace($tmpPATH, " ", $filename);
	$command = './run_csrf-bot.sh' . $fileNOpath;

	$old_path = getcwd();
	chdir('/var/www/challenge6/');
	$output = shell_exec($command); //run headless browser and save output
	chdir($old_path);
	if($output){
		echo $output;
	} else {
		echo "Error: " . $status;
	}
	//if(file_exists($filename)) {
	//	unlink($filename);
	//}
}

//check if user requested to clear the comments
if( array_key_exists( "clear", $_GET ) && $_GET[ 'clear' ] != NULL ) {
	if ($_GET['clear'] == "True"){
		//$cmt_array = array('Initial Comment');
        	$_SESSION['CSRFLink'] = "<broken>";
		$filename = check_tmp_file();
		write_link($filename);

		//if(file_exists($filename)) {
		//	unlink($filename);
		//}
	}
}

//check if user's php session has initialized the comments variable.
//Initialize it if not

elseif(isset($_SESSION['CSRFLink']) === false) {
        $sess_link = "<broken>";
        $_SESSION['CSRFLink'] = $sess_link;
	$filename = check_tmp_file();
	write_link($filename);

	//if(file_exists($filename)) {
        //        unlink($filename);
        //}
}
//append all comments stored in session var to $html. /index.php prints the $html var to the page when requests
$html .= "<a href='" . $_SESSION['CSRFLink'] . "'>Next Page</a><br>";

?>
