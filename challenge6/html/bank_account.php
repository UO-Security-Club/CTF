<?php

function getBalance($user) {
	$servername = "";
	$username = "root";
	$password = "UOSec2017!";
	$dbname = "CTF";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = "SELECT bank_balance FROM users WHERE user_name=".$user;
	echo $sql;
	$result = $conn->query($sql);
	if (!$result) {
		echo "Invalid db query";
	    // output data of each row 
	    //$rank = 1;
	   
	    //while($row = $result->fetch_assoc()) {
	        //echo '<tr><td>' . $rank . '</td><td>' . $row["user_name"]. "</td><td>" . intval($row["user_score"]). '</td></tr>';	
	    //    $rank += 1;
	    //}
	} else {
	    $balance = "Your balance is: " . $result;
	}
	return($balance);
}

if( array_key_exists( "isSally", $_GET ) && $_GET[ 'isSally' ] != NULL ) {
        $cky = $_GET['isSally'];
	//$_SESSION['user_name'] = "Sally";
	//setcookie('Sally', 'itsallgood');
	//$fp =fopen("sally.txt", "w");
        //fwrite($fp, "Found Sally!\n");
        //fclose($fp);
}

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if(isset($_SESSION['user_name'])) {
	$bank_html = "Account: " . $_SESSION['user_name'];
	$bank_html .= getBalance($_SESSION['user_name']);
	
} else {
	echo "You must be logged in to view this page<br>";
}

?>
