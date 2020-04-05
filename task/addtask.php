<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;


if(isset($_POST['addTask'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];


    $db = dbConnect::getDb();
    $t = new allTaskFunction();
    $c = $t->addTasks($name, $description, $status, $db);


    if($c){
        header('Location:  listtask.php');
    } else {
        echo "problem adding a task";
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
        <h1>Add a task</h1>
        <form action="" method="post">
        <!-- <input type="hidden" name="tid" value="" /> -->
            <div>
                <label for = "name">Name: </label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for = "description">Description: </label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div>
                <label for = "status">Status: </label>
                <select id="status" name="status">
                    <option value="To Do" >To Do</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
                </select>
            </div>
            <button type="submit" name="addTask" id="submit">Add a task</button>
            <a href="listtask.php" id="btn_back">Back to List</a>
        </form>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>


