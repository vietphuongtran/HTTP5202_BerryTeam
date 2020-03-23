<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;

$name = $description = $status = "";

if(isset($_POST['updateTask'])){
    $id= $_POST['id'];
    $db = dbConnect::getDb();

    $t = new allTaskFunction();
    $task = $t->getTaskById($id, $db);

    $name =  $task->name;
    $description = $task->description;
    $status = $task->status;

}
if(isset($_POST['updTask'])){
    $id= $_POST['tid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $db = dbConnect::getDb();
    $s = new allTaskFunction();
    $count = $s->updateTask($id, $name, $description, $status, $db);

    if($count){
        header('Location:  listtask.php');
    } else {
        echo "problem updating task";
    }
}
?>
<html lang="en">
    <head>
        <title>Task management system</title>
        <meta name="description" content="Student Management System">
        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
        <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>
    <body>
        <? include "header.php" ?>
        <? include '../includes/navigation.php' ?>
        <h1>Update task</h1>
        <form action="" method="post">
            <input type="hidden" name="tid" value="<?= $id; ?>" />
            <div>
                <label for = "name">Name: </label>
                <input type="text" name="name" id="name" value ="<?= $name; ?>">
            </div>
            <div>
                <label for = "description">Description: </label>
                <textarea name="description" id="description"><?= $description; ?></textarea>
            </div>
            <div>
                <label for = "status">Status: </label>
                <select id="status" name="status">
                    <? if
                    ($status === "To Do") {
                        $selected1 = 'selected';
                    }
                    else if ($status === "Doing") { $selected2 = 'selected';}
                    else {$selected3 = 'selected';}?>
                    <option value="To Do" <?=$selected1 ?> >To Do</option>
                    <option value="Doing" <?=$selected2 ?>>Doing</option>
                    <option value="Done" <?=$selected3 ?>>Done</option>
                </select>
            </div>
            <button type="submit" name="updTask" id="submit">Update</button>
            <a href="listtask.php" id="btn_back">Back to List</a>
        </form>
        <? include "footer.php" ?>
    </body>
</html>

