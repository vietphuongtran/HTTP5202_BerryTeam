<?php
require_once '../Classes/database.php';
require_once '../Classes/task.php';
require_once '../Classes/colleaguesxtasks.php';

//namespaces
use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;
use Classes\ColleaguesxTasks as colleaguesxtasks;


    //generate new database connection
    $db = dbConnect::getDb();
    //instanciate a new instance of a class
    $t = new allTaskFunction();
    //show tasks that are not been started
    $toDoTasks =  $t->showToDoTasks($db);
    //show all tasks that are in progress
    $doingTasks =  $t->showDoingTasks($db);
    //show all tasks that are done
    $doneTasks =  $t->showDoneTasks($db);
    //this is to show employee with the task
    $e = new colleaguesxtasks();
//    $taskEmployees = $e->showEmployeesWithTask($id, $db);
?>
<html lang="en">
    <head>
        <title>Task List</title>
        <meta name="description" content="Task Management System">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
        <link rel="stylesheet" href="../Stylesheets/task.css">
    </head>
    <body>
    <? include '../includes/header-landing.php' ?>
    <? include '../includes/navigation.php' ?>
    <div id="nav-bar">
        <label for="mobilenav" class="show-menu">Menu</label>
        <input type="checkbox" id="mobilenav" name="mobilenav">
    </div>
    <h2 class="taskH2">Task Management System</h2>
    <div>
        <form method="post" action="search.php">
            <input type="text" name="searchWord" />
            <input type="submit" class="showButton" name="searchTask" value="Search for task"/>

        </form>
    </div>
        <div class="flexbox">
            <div class="tasks">
                <div class="taskList" id="todo">To Do:</div>
                <?php foreach ($toDoTasks as $toDoTask) { ?>
                    <div class="taskName"><?= $toDoTask ->name ?></div>
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
                        <form action="show.php" method="post">
                            <input type="hidden" name="id" value="<?= $toDoTask->id ?>"/>
                            <input type="submit" class="showButton" name="showTask" value="Show details"/>
                        </form>
                        <form action="update.php" method="post">
                            <input type="hidden" name="id" value="<?= $toDoTask->id ?>"/>
                            <input type="submit" class="updateButton" name="updateTask" value="Update"/>
                        </form>
                    </div>

                <?php } ?>
            </div>
            <div class="tasks">
                <div class="taskList" id="doing">Doing:</div>
                <?php foreach ($doingTasks as $doingTask) { ?>
                    <div class="taskName"><?= $doingTask ->name ?></div>
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
                        <form action="show.php" method="post">
                            <input type="hidden" name="id" value="<?= $doingTask->id ?>"/>
                            <input type="submit" class="showButton"  name="showTask" value="Show details"/>
                        </form>
                        <form action="update.php" method="post">
                            <input type="hidden" name="id" value="<?= $doingTask->id ?>"/>
                            <input class="updateButton" type="submit" name="updateTask" value="Update"/>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="tasks">
                <div class="taskList" id="done">Done:</div>
                <?php foreach ($doneTasks as $doneTask) { ?>
                    <div class="taskName"><?= $doneTask ->name ?></div>
                    <div><?= $doneTask ->description ?></div>
                <?
                $id = $doneTask->id;
                $taskColleagues = $e->showColleaguesWithTask($id, $db);
                ?>
                <div class="showemployee"> Done by:
                    <? foreach ($taskColleagues as $taskColleague) { ?>
                        <span><?= $taskColleague->fname ?></span>
                    <? } ?>
                    </div>
                    <div>
                        <form action="show.php" method="post">
                            <input type="hidden" name="id" value="<?= $doneTask->id ?>"/>
                            <input type="submit" class="showButton"  name="showTask" value="Show details"/>
                        </form>
                        <form action="update.php" method="post">
                            <input type="hidden" name="id" value="<?= $doneTask->id ?>"/>
                            <input type="submit" class="updateButton" name="updateTask" value="Update"/>
                        </form>
                <?php } ?>
            </div>
        </div>
        <div><a href="add.php">Add a task</a></div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>

