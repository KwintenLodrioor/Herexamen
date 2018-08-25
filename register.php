<?php

include_once("Classes/User.class.php");
$feedback = "";

if (!empty($_POST)) {


    $user = new User();
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setFirstname($_POST['firstname']);
    $user->setLastname($_POST['lastname']);

    if (empty($_POST['firstname'])) {
        $feedback = "Please fill in your firstname";
    } else if (empty($_POST['lastname'])) {
        $feedback = "Please fill in your lastname";
    } else {
        $user->register();

    }
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>

<form action="" method="post">
    <input type="text" id="firstname" name="firstname" placeholder="Firstname">
    <input type="text" id="lastname" name="lastname" placeholder="Lastname">
    <input type="email" id="email" name="email" placeholder="Email">
    <input type="password" id="password" name="password" placeholder="Password">
    <input type="password" id="passwordRepeat" name="passwordRepeat" placeholder="Confirm Password">
    <input type="submit" value="Submit">
</form>

<div class="feedback">
    <p><?php echo $feedback; ?></p>
</div>

<p>Already an account? Login <a href="login.php">Here</a></p>

</body>
</html>