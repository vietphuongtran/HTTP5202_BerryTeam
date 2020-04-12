<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';
use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;

if(isset($_POST['addDiscuss'])) {
    $topic = $_POST['topic'];
    $content = $_POST['content'];

    $db = dbConnect::getDb();
    $dis = new allDiscussionFunction();
    $count = $dis->addDiscussion($content, $topic, $db);
    //validation
    $infoErr ="";
    function valInput ($info) {
        //need to declare global variable to use inside the function
        global $infoErr;
        if ($info === "" ) {

            $infoErr = "Field required";
        }
        return $infoErr;
    }
    valInput($topic);
    valInput($content);

    //if the query is right and validation passed then go
    if ($count && empty($infoErr)) {
        header('Location:  list.php');
    } else {
        echo "problem adding discussion";
    }
}
?>
<html lang="en">
    <head>
        <title>Task management system</title>
        <meta name="description" content="Task Management System">
        <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/discussion.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>
    <body>
    <? include '../includes/index-header.php' ?>
    <? include '../includes/navigation.php' ?>
    <div class="contentContainer">
        <div class="discussionContainer">
            <div class="discussionH2"><h2>Adding a discussion</h2></div>
            <form action="" method="post">
                <div>
                    <div><label for = "topic">Topic: </label></div>
                    <input type="text" class="inputfield" name="topic" value="<?=$topic?>"/>
                    <div class="errorMsg"><?=$infoErr?></div>
                </div>
                <div>
                    <div><label for = "content">Content: </label></div>
                    <textarea name="content" class="textareafield"><?=$content?></textarea>
                    <div class="errorMsg"><?=$infoErr?></div>
                </div>
                <button type="submit" class="updateButton" name="addDiscuss">Adding</button>
                <a href="list.php" id="btn_back">Back to List</a>
            </form>
        </div>
    </div>
    <? include '../includes/footer.php' ?>
    </body>
</html>
