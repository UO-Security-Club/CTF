<?php
// See: http://blog.ircmaxell.com/2013/02/preventing-csrf-attacks.html

// Start a session (which should use cookies over HTTP only).
session_start();

// Create a new CSRF token.
if (! isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

// Check a POST is valid.
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
   	echo "CSRF token is valid";
}else{
	echo "invalid CSRF token";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /> 
    <title>PHP CSRF Protection</title>
</head>
<body>
    <form action="index.php" method="post" accept-charset="utf-8">
        <input type="text" name="foo" />
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
        <input type="submit" value="Submit" />
    </form>
</body>
</html>
