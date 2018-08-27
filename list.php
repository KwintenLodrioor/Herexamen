<?php
session_start();

include_once("Classes/User.class.php");
include_once ("Classes/List.class.php");
include_once ("Classes/Task.class.php");
$feedback = "";

$list = new Lists();
$l = $list->showList();

$task = new Tasks();
$t = $task->listTask();


if (!empty($_POST)) {


    $list = new Lists();
    $list->setName($_POST['list']);




    if (empty($_POST['list'])) {
        $feedback = "Please give your list a name ";
    } else {
        $list->AddList();

    }


}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="main.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Home</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="task.php"><h3>Add Task</h3></a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>



<div class="feedback">
    <p><?php echo $feedback ?></p>
</div>

<div class="lists">
    <h2>Lists</h2>
    <br>
    <div class="AddList">
        <form action="" method="post" name="addlist">
            <input type="text" name="list" id="list" placeholder="New list">
            <input type="submit" VALUE="Add list">
        </form>
    </div>
    <br>
    <?php foreach($l as $a): ?>
        <a href="list.php?list=<?php echo$a['naam']; ?>"><p><?php echo $a['naam']; ?></p></a>
        <br>
    <?php endforeach; ?>
</div>


<div class="Tasks">

    <h2><?php echo $_GET['list']; ?></h2>
    <br>

    <?php foreach ($t as $ta): ?>

        <div class="<?php echo $ta['status']?>">
            <?php $taskid = $ta['id']; ?>
            <a href="detailTask.php?task=<?php echo $ta['title']; ?>"><p id="task" style="font-size: 1.2em; margin-left: 2%;"><?php echo $ta['title']; ?></p></a>
            <p id="hours"style="margin-left: 2%;display: block;">Hours:<?php echo $ta['hours']; ?></p>
            <p id="deadline"style="display: block;float: right;">Deadline:<?php echo $ta['deadline']; ?></p>
            <p id="status"style="margin-left: 2%">Status:<?php echo $ta['status']; ?></p>
            <?php
            date_default_timezone_set('Europe/Brussels');
            $now = time();
            $your_date = strtotime($ta['deadline']);
            $datediff = $your_date - $now;
            $days_remaining = floor($datediff/(60*60*24));
            ?>
            <p id="countdown"style="display: block; float: right"><?php echo $days_remaining;?> days remaining</p>


            <br>
        </div>
    <?php endforeach; ?>


</div>




</body>
</html>