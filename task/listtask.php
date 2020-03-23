<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
require_once '../Classes/employee.php';

use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;
use Classes\Employee as allEmployeeFunction;


    //generate new database connection
    $db = dbConnect::getDb();
    //instanciate a new instance of a class
    $t = new allTaskFunction();
    $toDoTasks =  $t->showToDoTasks($db);

    $doingTasks =  $t->showDoingTasks($db);

    $doneTasks =  $t->showDoneTasks($db);
    $e = new allEmployeeFunction();
//    $taskEmployees = $e->showEmployeesWithTask($id, $db);
?>
<html lang="en">
    <head>
        <title>Berry Team</title>
        <meta name="description" content="Task Management System">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    </head>
    <body>
        <h2>Task Management System</h2>
            <div class="flexbox">
                <div class="tasks">
                    <div>To Do:</div>
                    <?php foreach ($toDoTasks as $toDoTask) { ?>
                        <div><?= $toDoTask ->name ?></div>
                        <div><?= $toDoTask ->description ?></div>
                            <?
                                $id = $toDoTask->id;
                                $taskEmployees = $e->showEmployeesWithTask($id, $db);
                            ?>
                        <div class="showemployee"> Done by:
                        <? foreach ($taskEmployees as $taskEmployee) { ?>
                            <div><?= $taskEmployee->name ?></div>
                        <? } ?>
                        </div>
                        <div>
                            <form action="showtask.php" method="post">
                                <input type="hidden" name="id" value="<?= $toDoTask->id ?>"/>
                                <input type="submit" name="showTask" value="Show details"/>
                            </form>
                            <form action="updatetask.php" method="post">
                                <input type="hidden" name="id" value="<?= $toDoTask->id ?>"/>
                                <input type="submit" name="updateTask" value="Update"/>
                            </form>
                        </div>

                    <?php } ?>
                </div>
                <div class="tasks">
                    <div>Doing:</div>
                    <?php foreach ($doingTasks as $doingTask) { ?>
                        <div><?= $doingTask ->name ?></div>
                        <div><?= $doingTask ->description ?></div>
                        <?
                        $id = $doingTask->id;
                        $taskEmployees = $e->showEmployeesWithTask($id, $db);
                        ?>
                        <div class="showemployee"> Done by:
                            <? foreach ($taskEmployees as $taskEmployee) { ?>
                                <div><?= $taskEmployee->name ?></div>
                            <? } ?>
                        </div>
                        <div>
                            <form action="showtask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doingTask->id ?>"/>
                                <input type="submit" name="showTask" value="Show details"/>
                            </form>
                            <form action="updatetask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doingTask->id ?>"/>
                                <input type="submit" name="updateTask" value="Update"/>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <div class="tasks">
                    <div>Done:</div>
                    <?php foreach ($doneTasks as $doneTask) { ?>
                        <div><?= $doneTask ->name ?></div>
                        <div><?= $doneTask ->description ?></div>
                        <?
                        $id = $doneTask->id;
                        $taskEmployees = $e->showEmployeesWithTask($id, $db);
                        ?>
                        <div class="showemployee"> Done by:
                            <? foreach ($taskEmployees as $taskEmployee) { ?>
                                <div><?= $taskEmployee->name ?></div>
                            <? } ?>
                        </div>
                        <div>
                            <form action="showtask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doneTask->id ?>"/>
                                <input type="submit" name="showTask" value="Show details"/>
                            </form>
                            <form action="updatetask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doneTask->id ?>"/>
                                <input type="submit" name="updateTask" value="Update"/>
                            </form>
                    <?php } ?>
                </div>
            </div>
            <div><a href="addtask.php">Add a task</a></div>
    </body>

