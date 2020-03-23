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

//        if (isset($_POST['assignEmployee'])) {
//            $eid = $_POST['assignEmployee'];
//            $db = dbConnect::getDb();
//            $e = new allEmployeeFunction();
//            $count = $e->assignEmployee($tid, $eid, $db);
//        }
    }
    if (isset($_GET['assignEmployee'])) {
        $eid = $_GET['assignEmployee'];
        $count = $e->assignEmployee($tid, $eid, $db);
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
    <link rel="stylesheet" href="../Stylesheets/header.css">
    <link rel="stylesheet" href="../Stylesheets/footer.css">
</head>
<body>
    <h2>Detail information for <?=$task->name ?> task</h2>
    <div>
        <div class="showtask">
            <div>Task name: <?=$task->name ?></div>
            <div>Description: <?=$task->description ?></div>
            <div>Status: <?=$task->status ?></div>
            <div class="showemployee"> Done by:
                <? foreach ($taskEmployees as $taskEmployee) { ?>
                    <div><?= $taskEmployee->name ?></div>
                <? } ?>
            </div>
            <div>
                <form method="get" action="">
                    <label for="assignEmployee">Assign employee:</label>
                    <select name="assignEmployee">
                        <? foreach ($allEmployees as $employee) { ?>
                            <option value ="<?=$employee->id?>"><?= $employee->name ?></option>
                        <? } ?>
                    </select>
                    <input type="submit" name="assignEmployee" value="Assign"/>
                </form>
            </div>
            <form action="updatetask.php" method="post">
                <input type="hidden" name="id" value="<?= $tid ?>"/>
                <input type="submit" name="updateTask" value="Update"/>
            </form>
            <form action="deletetask.php" method="post">
                <input type="hidden" name="id" value="<?= $tid ?>" />
                <input type="submit" class="button btn btn-primary" name="deleteTask" value="Delete"/>
            </form>
        </div>

    </div>

</body>
