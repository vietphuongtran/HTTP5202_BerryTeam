<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
require_once '../Classes/colleague.php';
require_once '../Classes/colleaguesxtasks.php';

use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;
use Classes\Colleague as allColleagues;
use Classes\ColleaguesxTasks as colleaguesxtasks;

    $name = $description = $status = "";
    $db = dbConnect::getDb();
    $e = new allColleagues();
    $allColleagues = $e->listColleague($db);
    $ct = new colleaguesxtasks();

    if(isset($_POST['showTask'])){
        $tid= $_POST['id'];
        //instanciate the class task
        $t = new allTaskFunction();
        //get a specifica task
        $task = $t->getTaskById($tid, $db);
        //show the employee doing the task
        $taskColleagues = $ct->showColleaguesWithTask($tid, $db);

//        $assignEmployees = $e->assignEmployee($db, $tid, $eid);
//    //turn employee to Json object
//        $jsonAssignEmployees = json_encode($allEmployees);
//        header('Content-Type: application/json');
//        echo $jsonEmployees;
        if (isset($_POST['assignEmployee'])) {
            $eid = $_POST['employeeId'];
            $db = dbConnect::getDb();
            $ct = new colleaguesxtasks();;
            $count = $ct->assignColleague($tid, $eid, $db);
            if ($count) {
                header("Location: show.php");
            }
            else {
                echo "Bugs ahead! Go back";
            }
        }
    }

    //TO DO:
    // debug assign employee doing each task
    // unassign employee for each task
    // styling

//    $e = new Employee();
//    $employees = $e->showEmployees($id, $db);
//    //        $employeename = $employee->id;

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
    <? include '../includes/header-landing.php' ?>
    <? include '../includes/navigation.php' ?>
        <h2 class="taskH2">Task detail information </h2>
        <div class="contentContainer">
            <div class="taskContainer">
                <div>
                    <div class="taskName"><?=$task->name ?></div>
                    <div>Description: <?=$task->description ?></div>
                    <div>Status: <?=$task->status ?></div>
                </div>
                <div>Done by:
                    <? foreach ($taskColleagues as $taskColleague) { ?>
                        <span><?= $taskColleague->fname ?></span>
                    <? } ?>
                </div>
                <div>
                    <form action="update.php" method="post">
                        <input type="hidden"  name="id" value="<?= $tid ?>"/>
                        <input type="submit" class="updateButton" name="updateTask" value="Update"/>
                    </form>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $tid ?>" />
                        <input type="submit" class="showButton" name="deleteTask" value="Delete"/>
                    </form>
                </div>
                <a href="list.php" id="btn_back">Back to List</a>
            </div>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>