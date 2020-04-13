
<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/comment.php';

use Classes\Database as dbConnect;
use Classes\Comment as allComment;
if(isset($_POST['deleteComment'])) {
    $id = $_POST['cid'];
    $db = dbConnect::getDb();
    $t = new allComment();
}
if(isset($_POST['delComment'])) {
    $db = dbConnect::getDb();
    $id = $_POST['id'];

    $s = new allComment();
    $count = $s->deleteComment($db, $id);
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
            <div class="discussionContainer">
                <h2 id="discussionH2">Are you sure you want to delete this comment?</h2>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $id ?>" />
                    <button type="submit" class="showButton" name="delComment" id="submit">Delete</button>
                    <a href="list.php">No, go back to list</a>
                </form>
            </div>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>
</body>
