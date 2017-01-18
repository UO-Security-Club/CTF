<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
</head>

<body>
<!-- login form box -->
<link rel="stylesheet" href="css/style.css">
<div class="login">
<div class="heading">
<h2>Register</h2>
<!-- register form -->
<form method="post" action="register.php" name="registerform">

    <!-- the user name input field uses a HTML5 pattern check -->
    <!--<label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label> -->
<div class="input-group input-group-lg">
    <span class="input-group-addon"><i ></i></span>
    <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="Username" required />
</div>
    <!-- the email input field uses a HTML5 email type check -->
    <!--<label for="login_input_email">User's email</label>-->
<div class="input-group input-group-lg">
    <span class="input-group-addon"><i ></i></span>
    <input id="login_input_email" class="form-control" type="email" name="user_email" placeholder="Email" required />
</div>
    <!-- <label for="login_input_password_new">Password (min. 6 characters)</label> -->
<div class="input-group input-group-lg">
    <span class="input-group-addon"><i ></i></span>
    <input id="login_input_password_new" class="form-control" type="password" name="user_password_new" pattern=".{6,}" placeholder="Password" required autocomplete="off" /> 
</div>
   <!-- <label for="login_input_password_repeat">Repeat password</label> -->
<div class="input-group input-group-lg">
    <span class="input-group-addon"><i ></i></span>
    <input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" placeholder="Retype Password" required autocomplete="off" />
</div>
    <button type="submit" class="float" name="register" value="Register">Register</button>

</form>
<form method="GET" action="index.php">
    <button type="submit" class="float" value="Back to Login">Back to Login</button>
</form>
</div>
</div>
</body>
</html>

<!-- backlink
<a href="index.php">Back to Login Page</a>
