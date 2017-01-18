<html>
<?php
	$sPOSTscore = htmlspecialchars($_POST["score"]);
	$int = (is_numeric($sPOSTscore) ? (int)$sPOSTscore : 0);
	(int)$highScore = 99998;

	if ($int <= $highScore) {
		echo "<p>Sorry, no flag for you #l2fly</p>";
	} elseif ($int > $highScore) {
		echo "<p>Congrats! The Flag is: UOSEC_spreadURwingslol</p>";
	} else {
		echo "Oh no, an error occured.. Meh, Whatever";
	}
?>
</html>
