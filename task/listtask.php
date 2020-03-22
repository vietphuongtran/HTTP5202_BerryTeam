<?php
require_once 'database.php';
require_once 'task.php';
//use Classes\task as allTaskFunction;

    //generate new database connection
    $dbcon = Database::getDb();
    //instanciate a new instance of a class
    $t = new Task ();
    $toDoTasks =  $t->showToDoTasks(Database::getDb());

    $doingTasks =  $t->showDoingTasks(Database::getDb());

    $doneTasks =  $t->showDoneTasks(Database::getDb());
?>
<html lang="en">
    <head>
        <title>Berry Team</title>
        <meta name="description" content="Task Management System">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
        <link rel="stylesheet" href="Stylesheets/taskcrud.css">
    </head>
    <body>
        <h2>Task Management System</h2>
            <div class="flexbox">
                <div class="tasks">
                    <div>To Do:</div>
                    <?php foreach ($toDoTasks as $toDoTask) { ?>
                        <div><?= $toDoTask ->name ?></div>
                        <div><?= $toDoTask ->description ?></div>
                        <div>
                            <form action="showtask.php" method="post">
                                <input type="hidden" name="id" value="<?= $toDoTask->id ?>"/>
                                <input type="submit" name="showTask" value="Show details"/>
                            </form>
                            <form action="updatetask.php" method="post">
                                <input type="hidden" name="id" value="<?= $toDoTask->id ?>"/>
                                <input type="submit" name="updateTask" value="Update"/>
                            </form>
<!--                            <form action="deletetask.php" method="post">-->
<!--                                <input type="hidden" name="id" value="--><?//= $toDoTask->id ?><!--" />-->
<!--                                <input type="submit" class="button btn btn-primary" name="deleteTask" value="Delete"/>-->
<!--                            </form>-->
                        </div>

                    <?php } ?>
                </div>
                <div class="tasks">
                    <div>Doing:</div>
                    <?php foreach ($doingTasks as $doingTask) { ?>
                        <div><?= $doingTask ->name ?></div>
                        <div><?= $doingTask ->description ?></div>
                        <div>
                            <form action="showtask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doingTask->id ?>"/>
                                <input type="submit" name="showTask" value="Show details"/>
                            </form>
                            <form action="updatetask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doingTask->id ?>"/>
                                <input type="submit" name="updateTask" value="Update"/>
                            </form>
<!--                            <form action="deletetask.php" method="post">-->
<!--                                <input type="hidden" name="id" value="--><?//= $doingTask->id ?><!--" />-->
<!--                                <input type="submit" class="button btn btn-primary" name="deleteTask" value="Delete"/>-->
<!--                            </form>-->
                        </div>
                    <?php } ?>
                </div>
                <div class="tasks">
                    <div>Done:</div>
                    <?php foreach ($doneTasks as $doneTask) { ?>
                        <div><?= $doneTask ->name ?></div>
                        <div><?= $doneTask ->description ?></div>
                        <div>
                            <form action="showtask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doneTask->id ?>"/>
                                <input type="submit" name="showTask" value="Show details"/>
                            </form>
                            <form action="updatetask.php" method="post">
                                <input type="hidden" name="id" value="<?= $doneTask->id ?>"/>
                                <input type="submit" name="updateTask" value="Update"/>
                            </form>
<!--                            <form action="deletetask.php" method="post">-->
<!--                                <input type="hidden" name="id" value="--><?//= $doneTask->id ?><!--" />-->
<!--                                <input type="submit" class="button btn btn-primary" name="deleteTask" value="Delete"/>-->
<!--                            </form>-->
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div><a href="addtask.php">Add a task</a></div>
    </body>

