<?php
include_once("Classes/User.class.php");
include_once ("Classes/List.class.php");
include_once ("Classes/Task.class.php");
session_start();

$task = new Tasks();
$detail = $task->detailTask();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2><?php echo $_GET['task'] ?></h2>
<p><?php echo $detail['list'] ?></p>
<p><?php echo $detail['hours'] ?></p>
<p><?php echo $detail['deadline'] ?></p>
<p><?php echo $detail['status'] ?></p>





</body>
</html>

