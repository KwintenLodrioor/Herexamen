<?php
include_once("Classes/User.class.php");
include_once ("Classes/List.class.php");
include_once ("Classes/Task.class.php");
include_once ("Classes/Comment.class.php");
session_start();

$task = new Tasks();
$detail = $task->detailTask();
$feedback="";

$comment = new Comment();
$c = $comment->showComment($detail['id']);


if (!empty($_POST)) {
    $comment = new Comment();
    $comment->setComment($_POST['comment']);
    $comment->setTaskid($_POST['taskid']);

    if (empty($_POST['comment'])){
        $feedback = "Please fill in a commment";
    } else{
        $comment->saveComment();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<nav style="padding-left: 50px;font-weight: bolder; font-size: 1.2em"><?php echo $_GET['task'] ?></nav>
<p style="padding-left: 50px; padding-top: 50px;">List:     <?php echo $detail['list'] ?></p>
<p style="padding-left: 50px; padding-top: 20px;">Hours:    <?php echo $detail['hours'] ?></p>
<p style="padding-left: 50px; padding-top: 20px;">Deadline: <?php echo $detail['deadline'] ?></p>
<p style="padding-left: 50px; padding-top: 20px;">Status:   <?php echo $detail['status'] ?></p>
<p style="display: none;"><?php echo $detail['id'] ?></p>

<div class="feedback">
    <p><?php $feedback; ?></p>
</div>

<div style="padding-left: 20px; padding-top: 50px;" class="comment">
    <form action="" method="post">
        <input type="text" name="comment" id="comment">
        <input type="text" name="taskid" value="<?php echo $detail['id'] ?>"style="display: none;">
        <input type="submit" value="comment">
    </form>
</div>

<div style="padding-left: 50px; padding-top: 20px;" class="comments">
    <?php foreach ($c as $co): ?>
    <p><?php echo $_SESSION['user'] ?></p>
        <br>
    <p><?php echo $co['comment']?></p>
        <br>
        <br>
    <?php endforeach;?>
</div>







</body>
</html>

