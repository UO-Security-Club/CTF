<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login form</title>
</head>

<body>
    <!-- login form box -->
    <link rel="stylesheet" href="css/style.css">
    <div class="login">
        <div class="heading">
            <h2>Sign in</h2>
            <form method="post" action="index.php" name="loginform">

                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i ></i></span>
                    <input class="form-control" type="text" name="user_name" placeholder="Username or Email" required />
                </div>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i ></i></span>
                    <input id="login_input_password" class="form-control" type="password" name="user_password" placeholder="Password" autocomplete="off" required />
                </div>
                <button type="submit" class="float" name="login" value="Login">Login</button>
            </form>
            <form method="GET" action="register.php">
                <button type="submit" class="float" value="Register">Register</button>
            </form>
            <form method="post" action="index.php" name="guestlogin">
                <button type="submit" class="float" name="Guest" value="Guest">Continue As Guest</button>
            </form>
        </div>
    </div>
</body>
</html>
