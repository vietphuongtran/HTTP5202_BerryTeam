<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/task.php';
require_once '../Classes/colleaguesxtasks.php';

//namespaces
use Classes\Task as allTaskFunction;
use Classes\Database as dbConnect;
use Classes\ColleaguesxTasks as colleaguesxtasks;
$db = dbConnect::getDb();
if (isset($_POST['searchTask'])) {
    $searchWord = $_POST['searchWord'];
    $db = dbConnect::getDb();
    $t = new allTaskFunction();
    $tc = new colleaguesxtasks();
    $searchtasks = $t->searchTask($searchWord, $db);
    //this doesn't work, found out why
    $errorMsg = "";
    if (empty($searchWord)  || $searchtasks === "") {
        $errorMsg = "No result, please change your search keyword and try again.";
    }
}

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
        <div class="contentContainer">
            <div class="taskContainer">
                <h2>Search result:</h2>
                <div class="errorMsg"><?$errorMsg?></div>
                <?php foreach ($searchtasks as $task) { ?>
                <div class="taskName"><?= $task->name ?></div>
                <div><?= $task->description ?></div>
                <div>Status: <?= $task->status ?></div>
                <?
                $id = $task->id;
                $taskColleagues = $tc->showColleaguesWithTask($id, $db);
                ?>
                <div class="showemployee"> Done by:
                    <? foreach ($taskColleagues as $taskColleague) { ?>
                        <div><?= $taskColleague->fname ?></div>
                    <? } ?>
                </div>
                    <div>
                        <form action="show.php" method="post">
                            <input type="hidden" name="id" value="<?= $task->id ?>"/>
                            <input type="submit" class="showButton" name="showTask" value="Show details"/>
                        </form>
                        <form action="update.php" method="post">
                            <input type="hidden" name="id" value="<?= $task->id ?>"/>
                            <input type="submit" class="updateButton" name="updateTask" value="Update"/>
                        </form>
                    </div>
                <?php } ?>
                <a href="list.php" id="btn_back">Back to List</a>
            </div>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>

