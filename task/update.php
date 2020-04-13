<?php
require_once '../Classes/databaseserver.php';
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
    function valInput ($info) {
        //need to declare global variable to use inside the function
        global $infoErr;
        if ($info === "" ) {

            $infoErr = "Field required";
        }
        return $infoErr;
    }
    $ddlErr = "";
    function valDdl ($ddlInfo) {
        //need to declare global variable to use inside the function
        global $ddlErr;
        if ($ddlInfo === "none" ) {

            $ddlErr = "Field required";
        }
        return $ddlErr;
    }
    valDdl($status);
    valInput($name);
    valInput($description);
    if($count && empty($ddlErr) && empty($infoErr)){
        header('Location:  list.php');
    } else {
        echo "problem updating task";
    }
}
?>
<html lang="en">
    <head>
        <title>Task management system</title>
        <meta name="description" content="Task Management System">
        <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
        <link rel="stylesheet" href="../Stylesheets/task.css">
    </head>
    <body>
        <? include '../includes/header-landing.php' ?>
        <? include '../includes/navigation.php' ?>
        <h2 class="taskH2">Update task</h2>
        <div class="contentContainer">
            <div class="taskContainer">
                <div class="taskName">Please fill out to edit information</div>
                <form action="" method="post">
                    <input type="hidden" name="tid" value="<?= $id; ?>" />
                    <div>
                        <label for = "name">Name: </label>
                        <input type="text" class="inputField" name="name" id="name" value ="<?= $name; ?>">
                        <div class="errorMsg"><?=$infoErr?></div>
                    </div>
                    <div>
                        <div><label for = "description">Description: </label></div>
                        <textarea name="description" class="textareaField" id="description"><?= $description; ?></textarea>
                        <div class="errorMsg"><?=$infoErr?></div>
                    </div>
                    <div>
                        <label for = "status">Status:  </label>
                        <select id="status" name="status">
                            <option value="none">--Please choose one--</option>
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
                        <div class="errorMsg"><?=$ddlErr?></div>
                    </div>
                    <button type="submit" class="updateButton" name="updTask" id="submit">Update</button>
                    <a href="list.php" id="btn_back">Back to List</a>
                </form>
            </div>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>

