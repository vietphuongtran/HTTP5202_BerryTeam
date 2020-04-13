<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/discussion.php';
use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;

if(isset($_POST['deleteDiscuss'])) {
    $id = $_POST['did'];
    $db = dbConnect::getDb();
    $t = new allDiscussionFunction();
    //Error: PHP Fatal error: Uncaught Error: Call to a member function prepare() on string in /C:/MAMP/htdocs/PHP/FinalProject/Classes/discussion.php on line 16
    //Solution: Remember to arrange the variable in the right order like in the function
    $discussion = $t->getDiscussionById($db, $id);
    $content =  $discussion->content;
    $topic = $discussion->topic;

}
if(isset($_POST['delDiscussion'])) {
    $db = dbConnect::getDb();
    $id = $_POST['id'];

    $s = new allDiscussionFunction();
    $count = $s->deleteDiscussion($id, $db);
    //Error: Call to a member function prepare() on string
    if ($count) {
        header("Location: list.php");
    } else {
        echo " problem deleting";
    }
}

?>
<html lang="en">
<head>
    <title>Task management system</title>
    <meta name="description" content="Task Management System">
    <link rel="stylesheet" href="../Stylesheets/discussion.css">
    <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<body>
    <? include '../includes/header-landing.php' ?>
    <? include '../includes/navigation.php' ?>
    <div class="contentContainer">
        <div class="discussionContainer" id="deleteDis">
            <h2 id="discussionH2">Are you sure you want to delete this discussion?</h2>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $id; ?>" />
                <button type="submit" class="showButton" name="delDiscussion" id="submit">Delete</button>
                <a href="list.php">No, go back to list</a>
            </form>
        </div>
    </div>
    <? include '../includes/footer-landing.php' ?>
</body>
</html>

