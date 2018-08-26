<?php
session_start();

include_once("Classes/List.class.php");
include_once ("Classes/User.class.php");
include_once ("Classes/Task.class.php");

$list = new Lists();
$l = $list->showList();
$feedback="";

if (!empty($_POST)) {
    $task = new Tasks();
    $task->setTitle($_POST['title']);
    $task->setList($_POST['list']);
    $task->setHours($_POST['time']);
    $task->setDeadline($_POST['deadline']);


    if (empty($_POST['title'])){
        $feedback = "Give your task a title";
    } else if (empty($_POST['list'])){
        $feedback = "Assign your task to a list";
    } else if (empty($_POST['time'])){
        $feedback = "Set your work hours to the task";
    } else{
        $task->saveTask();
        header('Location:index.php');
    }
}



?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Task</title>
</head>
<body>

<form action="" method="post">
<p>select list:</p>
    <select name="list" id="list">

        <?php foreach($l as $a) :?>
        <option name="list" id="list" value="<?php echo $a['naam']; ?>"><?php echo $a['naam']; ?></option>
        <?php endforeach;?>
    </select>

    <div class="feedback">
        <p><?php echo $feedback ?></p>
    </div>

    <input type="text" name="title" id="title" placeholder="title">
    <input type="text" name="time" id="time" placeholder="Work hours">
    <input type="date" name="deadline" id="deadline" placeholder="deadline, YYYY-MM-DD ">
    <input type="submit">



</form>

</body>
</html>