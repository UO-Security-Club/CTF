<?php

$server = "localhost";
$username = "root";
$password = "UOSec2017!";
$dbname = "CTF";

function updateScore($usr_id, $chal_id, $usr_score, $chal_pts, $db_conn) {
	//Select all rows pertaining to the user
	$completed_tbl = "SELECT * FROM completed WHERE user_id='$usr_id'";
	$result = $db_conn->query($completed_tbl);
	if (!$result) {
		exit("Invalid query");
	}

	$duplicate = 0;
	//If num_rows is greater than 0, we know the user has completed at least one challenge
	if ($result->num_rows > 0) {
		//Iterate over row results and look for challenge ID of submitted flag
		while($row = $result->fetch_assoc()) {
			//If challenge ID exists then we know the user has already completed the challenge
			if ($row["chal_id"] == $chal_id) {
				$duplicate = 1;
			}
		}
		if ($duplicate != 0) {
			//return and do NOT create duplicate entry and/or give user points again
			return 1;
		} else {
			$insrt = "INSERT INTO completed (user_id, chal_id)
			VALUES ('$usr_id', '$chal_id')";
			if ($db_conn->query($insrt) === TRUE) {
				$new_score = $usr_score + $chal_pts;
				$add_score = "UPDATE users SET user_score='$new_score' WHERE user_id='$usr_id'";
				if ($db_conn->query($add_score) === TRUE) {
					return 0;
				} else {
					exit("Could not update score for users table");
				}
			} else {
				exit("Error: " . $insrt . "<br>" . $db_conn->error);
			}
		}
	//If num_rows returned 0, then we know this is the first challenge completed by the user
	} else {
		$insrt = "INSERT INTO completed (user_id, chal_id)
		VALUES ('$usr_id', '$chal_id')";
		if ($db_conn->query($insrt) === TRUE) {
			$new_score = $usr_score + $chal_pts;
			$add_score = "UPDATE users SET user_score='$new_score' WHERE user_id='$usr_id'";
                        if ($db_conn->query($add_score) === TRUE) {
                        	return 0;
                        } else {
				exit("Error: " . $add_score . "<br>" . $db_conn->error);
			}

                } else {
                        exit("Error: " . $insrt . "<br>" . $db_conn->error);
		}

	}

	return 0;
}

echo "<html>";
session_start();
if (isset($_SESSION['user_name'])) {
	$usr = $_SESSION['user_name'];
} else {
	exit("<p>You must be logged in to submit a flag</p><br><a href='index.php'>Login</a>");
}

$sPOSTflag = htmlspecialchars($_POST["flag"]);
$sChal = htmlspecialchars($_POST["chal_flag"]);

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM challenges";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$isFlag = 0;
	$i = 1;
	while($row = $result->fetch_assoc()) {
		if (strcmp($row["chal_flag"], $sPOSTflag) == 0 && strcmp($row["chal_name"], $sChal) == 0) {
			$isFlag = 1;
			$chalID = $row["chal_id"];
			$chalPTS = $row["chal_points"];
		}
	}

	if ($isFlag == 1) {
	
		$sql = "SELECT user_name, user_id, user_score FROM users WHERE user_name='$usr'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$user_id = $row["user_id"];
			$user_score = intval($row["user_score"]);
			//echo "Found user ID: " . $user_id . " for username: " . $usr;
			//echo "Your current score is: " . $user_score;
			$ret = updateScore($user_id, $chalID, $user_score, $chalPTS, $conn);
			if ($ret > 0) {
				//echo "Error: updateScore returned: " . $ret;
				echo "<br>You've already completed this challenge. Way to be a tryhard..";
			}
		} else {
			//echo "Result->num_rows returned: " . $result->num_rows;
			echo "<br>You don't exists";
		}
		if ($ret == 0) {
			echo "<br>Congrats! You got the flag! Here's " . $chalPTS . "pts, take it or leave it..";
		}
	} else {
		echo "<p>Sorry, that's not the flag...</p><br>";
		echo '<img src="http://imgc.allpostersimages.com/images/P-488-488-90/92/9257/WTS3500Z/posters/kitten-hang-in-there.jpg">';
	}
}
$conn->close();
echo "<br><a href='challenges.php'>Back to Challenges</a>";
echo "</html>";
?>
