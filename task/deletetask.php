<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = dbConnect::getDb();

    $t = new allTaskFunction();
    $task = $t->getTaskById($id, $db);

    $name =  $task->name;
    $description = $task->description;
    $status = $task->status;

}
if(isset($_POST['delTask'])) {
    $id = $_POST['tid'];
    $db = dbConnect::getDb();

    $s = new allTaskFunction();
    $count = $s->deleteTask($id, $db);
    if ($count) {
        header("Location: listtask.php");
    } else {
        echo " problem deleting";
    }
}

?>
<html lang="en">
    <head>
        <title>Task management system</title>
        <meta name="description" content="Student Management System">
        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/index.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>

    <body>
        <? include '../includes/header-index.php' ?>
        <? include '../includes/navigation.php' ?>
        <h2>Are you sure you want to delete <?= $name; ?> task?</h2>
        <form method="POST" action="">
            <input type="hidden" name="tid" value="<?= $id; ?>" />
            <button type="submit" name="delTask" id="submit">Delete</button>
            <a href="listtask.php">No, go back to list</a>
        </form>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>
