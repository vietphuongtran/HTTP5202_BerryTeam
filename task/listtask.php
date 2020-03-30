<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
require_once '../Classes/colleaguessxtasks.php';


use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;
use Classes\ColleaguesxTasks as colleaguesxtasks;


    //generate new database connection
    $db = dbConnect::getDb();
    //instanciate a new instance of a class
    $t = new allTaskFunction();
    $toDoTasks =  $t->showToDoTasks($db);

    $doingTasks =  $t->showDoingTasks($db);

    $doneTasks =  $t->showDoneTasks($db);
    $e = new colleaguesxtasks();
//    $taskEmployees = $e->showEmployeesWithTask($id, $db);
?>
<html lang="en">
    <head>
        <title>Task List</title>
        <meta name="description" content="Task Management System">
        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
        <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>
    <? include '../includes/index-header.php' ?>
    <? include '../includes/navigation.php' ?>
    <body>

    <div id="nav-bar">
        <label for="mobilenav" class="show-menu">Menu</label>
        <input type="checkbox" id="mobilenav" name="mobilenav">
    </div>
    <h2>Task Management System</h2>
        <div class="flexbox">
            <div class="tasks">
                <div>To Do:</div>
                <?php foreach ($toDoTasks as $toDoTask) { ?>
                    <div><?= $toDoTask ->name ?></div>
                    <div><?= $toDoTask ->description ?></div>
                        <?
                            $id = $toDoTask->id;
                            $taskColleagues = $e->showColleaguesWithTask($id, $db);
                        ?>
                    <div class="showemployee"> Done by:
                    <? foreach ($taskColleagues as $taskColleague) { ?>
                        <div><?= $taskColleague->fname ?></div>
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
                    $taskColleagues = $e->showColleaguesWithTask($id, $db);
                    ?>
                    <div class="showemployee"> Done by:
                        <? foreach ($taskColleagues as $taskColleague) { ?>
                            <div><?= $taskColleague->fname ?></div>
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
                $taskColleagues = $e->showColleaguesWithTask($id, $db);
                ?>
                <div class="showemployee"> Done by:
                    <? foreach ($taskColleagues as $taskColleague) { ?>
                        <div><?= $taskColleague->fname ?></div>
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
        <? include '../includes/footer.php' ?>
    </body>

