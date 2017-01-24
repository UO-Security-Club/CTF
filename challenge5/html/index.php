<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	include_once('source/check_session.php');
	include("source/comment.php");
	echo "<b>Welcome to the Comments Page!</b>";
?> 
<br><div id="input">
	<form name="XSS" action="#" method="GET">
		<p>Enter Comment: 
		<input type="text" name="comment">
		<input type="submit" value="Submit">
		</p>
	</form>
</div>
<br><div>
        <form name="CLEAR" action="#" method="GET">
                <button name="clear" type="submit" value="True">Clear Comments</button>
        </form>

<?php
	echo $html;
?>
</div>
</body>
</html>
