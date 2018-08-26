<?php
$dsn = 'mysql:hosy=localhost;dbname=demo';
$username = 'root';
$password = '';

try{
    // connect to mysql
    $con = new PDO($dsn,$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo 'Not Connected '.$ex->getMessage();
}
// mysql select query
$stmt = $con->prepare('SELECT * FROM users');
$stmt->execute();
$users = $stmt->fetchAll();

foreach ($users as $user)
{
    echo $user['id'].' - '.$user['firstname'].' - '.$user['lastname'].' - '.$user['email'].'<br>';
}


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>