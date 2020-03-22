<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;

    $name = $description = $status = "";

    if(isset($_POST['showTask'])){
        $id= $_POST['id'];
        $db = dbConnect::getDb();

        $t = new allTaskFunction();
        $task = $t->getTaskById($id, $db);

        $name =  $task->name;
        $description = $task->description;
        $status = $task->status;
    }
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
    <h2>Detail information for <?=$name; ?> task</h2>
    <div>
        <div class="showtask">
            <div>Task name: <?=$name; ?></div>
            <div>Description: <?=$description; ?></div>
            <div>Status: <?=$status; ?></div>
            <form action="updatetask.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>"/>
                <input type="submit" name="updateTask" value="Update"/>
            </form>
            <form action="deletetask.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>" />
                <input type="submit" class="button btn btn-primary" name="deleteTask" value="Delete"/>
            </form>
        </div>
<!--        <div class="showemployee">-->
<!--            --><?// foreach ($employees as $employee) { ?>
<!--            <div>--><?//= $employee->name ?><!--</div>-->
<!--            --><?// } ?>
<!--        </div>-->

    </div>

</body>
