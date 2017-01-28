<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$tmpPATH = '/var/www/challenge5/html/xss_tmp/';

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
	//This function creates/manages the php file that the 'admin' browser will read.
	//It reflects the comments page the user is posting to.
	$page .= "<?php\n";
	//Ensure that the 'admin' browser has a cookie set, then add the Flag cookie
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

//check if request is for submitting a comment and ensure that it's not NULL
if( array_key_exists( "comment", $_GET ) && $_GET[ 'comment' ] != NULL ) {
	$cmt_str = $_GET[ 'comment' ];

	//check that the comment is not longer than 80 characters
	if (strlen($cmt_str) > 80) {
		$cmt_str = substr($cmt_str, 0, 80);
	}

	//simple filter for script tags. Replaces them with nope tags lol
	$js = 'script>';
	$cmt_str = str_replace($js, "nope>", $cmt_str);

	//If user submits a comment and their session var has not been initialized, then initialize it
	if(isset($_SESSION['Comments']) === false) {
        	$cmt_array = array('Initial Comment');
        	$_SESSION['Comments'] = $cmt_array;
	}

	//Currently only allowing 5 comments
	if(count($_SESSION['Comments']) < 5) {
		array_push($_SESSION['Comments'], $cmt_str);
	}

	$filename = check_tmp_file();
	write_comments($filename);

	//get the user's tmp file name without the file path. This is sent as an argument to the bash scripts that dispatches the 'admin' browser.
	//This how the 'admin' browser knows which user's comment page to read.
	$fileNOpath = str_replace($tmpPATH, " ", $filename);
	$command = './run_xss-but.sh' . $fileNOpath;

	$old_path = getcwd();
	chdir('/var/www/challenge5/');
	$output = shell_exec($command); //run headless browser and save output
	chdir($old_path);
	if($output){
		//The headless browser will output the URLs of pages that it successfully rendered.
		//The bash script will grep the URLs for 'grabCookie.php?cookie='. In which case, we assume the user successfully tricked the
		//browser into sending it's cookie to grabCookie.php. The grep'd output is saved to the user's session var so they can view stolen cookies.
		$_SESSION['myCookies'] = $output; 
	} else {
		echo "Error: " . $status;
	}
	if(file_exists($filename)) {
		unlink($filename);
	}
}

//check if user requested to clear the comments
if( array_key_exists( "clear", $_GET ) && $_GET[ 'clear' ] != NULL ) {
	if ($_GET['clear'] == "True"){
		$cmt_array = array('Initial Comment');
        	$_SESSION['Comments'] = $cmt_array;
		$filename = check_tmp_file();
		write_comments($filename);

		if(file_exists($filename)) {
			unlink($filename);
		}
	}
}

//check if user's php session has initialized the comments variable.
//Initialize it if not
elseif(isset($_SESSION['Comments']) === false) {
        $cmt_array = array('Initial Comment');
        $_SESSION['Comments'] = $cmt_array;
	$filename = check_tmp_file();
	write_comments($filename);

	if(file_exists($filename)) {
                unlink($filename);
        }
}
//append all comments stored in session var to $html. /index.php prints the $html var to the page when requests
$html .= '<br><b>Comments:</b><br>';
foreach($_SESSION['Comments'] as $key=>$value) {
        $html .= 'Post #'.$key.'<br><li>'.$value.'<br>';
}

?>
