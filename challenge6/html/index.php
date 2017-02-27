<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	include_once('source/check_session.php');
	include('source/submit_link_fix.php');
	//include("source/submit_link_fix.php");
	echo "<h2>L2Bank.com</h2><br>The most trusted site for all your banking information needs!<br>";
?> 
<br><div id="input">
	<form name="CSRF" action="#" method="GET">
		<p>Fix broken link to next page: </p><br>
		<!--- <input type="text" name="comment">-->
		<textarea rows="8" cols="40" name="newLink"></textarea>
		<input type="submit" value="Submit">
	</form>
</div>
<br><div>
        <form name="CLEAR" action="#" method="GET">
                <button name="clear" type="submit" value="True">Undo last submit</button>
        </form>

<?php
	echo $html;
?>
</div>
</body>
</html>
