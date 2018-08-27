<?php
session_start();

include_once("Classes/User.class.php");
include_once ("Classes/List.class.php");
include_once ("Classes/Task.class.php");
$feedback = "";

$list = new Lists();
$l = $list->showList();

$task = new Tasks();
$t = $task->showTask();

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
    <link rel="stylesheet" href="style.css">

    <title>Home</title>
</head>
<body class="grid-container">
<div class="header">
    <div id="logout"><a href="logout.php">LOGOUT</a></div>
</div>


<div class="side">
<form id="addform" action="" method="post">
    <input type="text" name="list" id="list" placeholder="New list">
    <input id="addbtn" type="submit" VALUE="Add List">
</form>
</div>
<div class="blok">


<div class="feedback">
    <p><?php echo $feedback ?></p>
</div>

<div class="lists">
    <h2>Lijsten</h2>
    <div class="part">
    <br>
<?php foreach($l as $a): ?>
<?php echo $a['naam']; ?>
    <br>
<?php endforeach; ?>
</div>
</div>


<div class="Tasks">
    <a href="task.php"><h3>Add Task</h3></a>
    <h2>Taken</h2>
    <hr>
    <?php foreach ($t as $ta): ?>
        <p>Task:<?php echo $ta['title']; ?></p>
        <p>List:<?php echo $ta['list']; ?></p>
        <p>Hours:<?php echo $ta['hours']; ?></p>
        <p>Deadline:<?php echo $ta['deadline']; ?></p>
        <hr>
    <?php endforeach; ?>

</div>
</div>



</body>
</html>