<?php

include_once("Classes/User.class.php");
$feedback = "";

if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password);
    if ($user->canLogin()){
        $user->login();
    } else{
        $feedback = "Sorry something went wrong! Please check your email or password";
        $error = true;
    }

    if (empty($_POST['email'])){
        $feedback = "Please fill in your email.";
    } elseif (empty($_POST['password'])){
        $feedback = "Please fill in your password.";
    }
}


?><!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mainlogin.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

<div class="login">
<form action="" method="post">
    <input type="text" id="email" name="email" placeholder="Email">
    <input type="text" id="password" name="password" placeholder="Password">
    <input type="submit"value="Submit">
</form>
    <a href="register.php">register</a>
</div>

<div class="feedback">
    <p><?php echo $feedback ?></p>
</div>


</body>
</html>