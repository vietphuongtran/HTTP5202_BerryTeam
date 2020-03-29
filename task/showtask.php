<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
require_once '../Classes/employee.php';

use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;
use Classes\Employee as allEmployeeFunction;

    $name = $description = $status = "";
    $db = dbConnect::getDb();
    $e = new allEmployeeFunction();
    $allEmployees = $e->selectAllEmployees($db);

    if(isset($_POST['showTask'])){
        $tid= $_POST['id'];

        $t = new allTaskFunction();
        $task = $t->getTaskById($tid, $db);
        $taskEmployees = $e->showEmployeesWithTask($tid, $db);

//        $assignEmployees = $e->assignEmployee($db, $tid, $eid);
//    //turn employee to Json object
//        $jsonAssignEmployees = json_encode($allEmployees);
//        header('Content-Type: application/json');
//        echo $jsonEmployees;
    }
    if (isset($_POST['assignEmployee'])) {
        $eid = $_POST['employeeId'];
        $db = dbConnect::getDb();
        $e = new allEmployeeFunction();
        $count = $e->assignEmployee($tid, $eid, $db);
        if ($count) {
            header("Location: listtask.php");
        }
        else {
            echo "Bugs ahead! Go back";
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
        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
        <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--        <script src="assignEmployee.js"></script>-->
    </head>
    <body>
        <? include '../includes/index-header.php' ?>
        <? include '../includes/navigation.php' ?>
        <h2>Detail information for <?=$task->name ?> task</h2>
            <div class="flexbox" id="showtaskemployee">
                <div class="tasks" id="showtask">
                    <div>Task name: <?=$task->name ?></div>
                    <div>Description: <?=$task->description ?></div>
                    <div>Status: <?=$task->status ?></div>
                </div>
                <div class="showemployee">
                    <div>Done by:
                        <? foreach ($taskEmployees as $taskEmployee) { ?>
                            <div><?= $taskEmployee->name ?></div>
                        <? } ?>
                    </div>
                    <div>
                        <form method="POST" action="">
                            <label for="assignEmployee">Assign employee:</label>
                            <select name="emmployeeId" id="employeeId">
                                <? foreach ($allEmployees as $employee) { ?>
                                    <option value ="<?=$employee->id?>"><?= $employee->name ?></option>
                                <? } ?>
                            </select>
                            <div><input type="submit" name="assignEmployee" value="Assign"/></div>
                        </form>
                    </div>
                </div>
            </div>
                <div>
                    <form action="updatetask.php" method="post">
                        <input type="hidden" name="id" value="<?= $tid ?>"/>
                        <input type="submit" name="updateTask" value="Update"/>
                    </form>
                    <form action="deletetask.php" method="post">
                        <input type="hidden" name="id" value="<?= $tid ?>" />
                        <input type="submit" class="button btn btn-primary" name="deleteTask" value="Delete"/>
                    </form>
                </div>
        <? include '../includes/footer.php' ?>
    </body>
</html>