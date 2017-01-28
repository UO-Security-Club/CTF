<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	include_once('source/check_session.php');
	include("source/comment.php");
	echo "<b>Welcome to the Comments Page!</b>";
	echo "** Brief description: the admin of this site checks every comment that you post. Force his browser to send you his cookie.<br>";
	echo "Inject some script that will send a cookie to '/grabCookie.php?cookie='. The flag is in the admin's cookie. Good luck :)<br><br>";
	//echo $_SESSION['myCookies'];
?> 
<br><div id="input">
	<form name="XSS" action="#" method="GET">
		<p>Enter Comment: </p><br>
		<!--- <input type="text" name="comment">-->
		<textarea rows="8" cols="40" name="comment"></textarea>
		<input type="submit" value="Submit">
	</form>
</div>
<br><div>
        <form name="CLEAR" action="#" method="GET">
                <button name="clear" type="submit" value="True">Clear Comments</button>
        </form>

<?php
	echo "View the last cookie you stole <a href='/viewCookies.php'>here</a><br><br>";
	echo $html;
?>
</div>
</body>
</html>
