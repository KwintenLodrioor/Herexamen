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
var_dump($detail['id']);

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
    <title>Document</title>
</head>
<body>

<h2><?php echo $_GET['task'] ?></h2>
<p><?php echo $detail['list'] ?></p>
<p><?php echo $detail['hours'] ?></p>
<p><?php echo $detail['deadline'] ?></p>
<p><?php echo $detail['status'] ?></p>
<p style="display: none;"><?php echo $detail['id'] ?></p>

<div class="feedback">
    <p><?php $feedback; ?></p>
</div>

<div class="comment">
    <form action="" method="post">
        <input type="text" name="comment" id="comment">
        <input type="text" name="taskid" value="<?php echo $detail['id'] ?>"style="display: none;">
        <input type="submit" value="comment">
    </form>
</div>

<div class="comments">
    <?php foreach ($c as $co): ?>
    <p><?php echo $_SESSION['user'] ?></p>
    <p><?php echo $co['comment']?></p>
    <?php endforeach;?>
</div>







</body>
</html>

