<?php
require_once '../Classes/databaseserver.php';
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
        header("Location: list.php");
    } else {
        echo " problem deleting";
    }
}

?>
<html lang="en">
    <head>
        <title>Task management system</title>
        <meta name="description" content="Student Management System">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
        <link rel="stylesheet" href="../Stylesheets/task.css">
    </head>

    <body>
        <? include '../includes/index-header.php' ?>
        <? include '../includes/navigation.php' ?>
        <h2 class="taskH2">Are you sure you want to delete <?= $name; ?> task?</h2>
        <form method="POST" action="">
            <input type="hidden" name="tid" value="<?= $id; ?>" />
            <button type="submit" class="showButton" name="delTask" id="submit">Delete</button>
            <a href="list.php">No, go back to list</a>
        </form>
        <? include '../includes/footer.php' ?>
    </body>
</html>
