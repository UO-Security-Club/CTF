<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	include("source/search.php");
	echo "<b>Search our database!</b>";
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    <script type="text/javascript" src="js/runGame.js"></script>
<br><div id="input">
	<form name="XSS" action="#" method="GET">
		<p>Search For: 
		<input type="text" name="search">
		<input type="submit" value="Submit">
		</p>
	</form>
<?php
	echo $html;
?>
</div>
</body>
</html>
