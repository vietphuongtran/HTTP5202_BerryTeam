<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/discussion.php';
require_once '../Classes/comment.php';

use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;
use Classes\Comment as allComment;
$db = dbConnect::getDb();
$d = new allDiscussionFunction();

if (isset($_POST['addComment'])) {
    $discussion_id = $_POST['commentid'];
}

if (isset($_POST['commentAdd'])) {
    $comment = $_POST['comment'];
    $discussionid = $_POST['discussionid'];
    $db = dbConnect::getDb();
    $c = new allComment();
    //Error: PHP Fatal error: Uncaught Error: Call to a member function prepare() on string in /C:/MAMP/htdocs/PHP/FinalProject/Classes/comment.php on line 26
    //Solution: Remember to arrange the variable in the right order like in the function
    $count = $c->addComment($comment, $db, $discussionid);
    $infoErr = "";
    function valInput($info)
    {
        //need to declare global variable to use inside the function
        global $infoErr;
        if ($info === "") {

            $infoErr = "Field required";
        }
        return $infoErr;
    }

    valInput($comment);
    $ddlErr = "";
    function valDdl($ddlInfo)
    {
        //need to declare global variable to use inside the function
        global $ddlErr;
        if ($ddlInfo === "none") {

            $ddlErr = "Field required";
        }
        return $ddlErr;
    }

    //valDdl($discussionid);

    //if the query is right and validation check out then go
    if (($count) && empty($infoErr) && empty($ddlErr)) {
        header('Location:  list.php');
    } else {
        echo "problem adding comment";
    }
}
?>
<html lang="en">
<head>
    <title>Task management system</title>
    <meta name="description" content="Student Management System">
    <link rel="stylesheet" href="../Stylesheets/discussion.css">
    <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/index-header.php' ?>
<? include '../includes/navigation.php' ?>
<h2>Add a comment</h2>
<div class="contentContainer">
    <div class="discussionContainer">
        <form action="" method="post">
            <div>
                <div><label for = "comment">Your comment: </label></div>
                <textarea type="text" class="textareafield" name="comment" id="comment"></textarea>
                <div class="errorMsg"><?$infoErr?></div>
                <input type="hidden" name="discussionid" value="<?=$discussion_id; ?>" />
            </div>
            <div class="errorMsg"><?$ddlErr?></div>
            <input type="submit" class="updateButton" name="commentAdd" id="submit" value="Adding"/>
            <a href="list.php" id="btn_back">Back to List</a>
        </form>
    </div>
</div>

<? include '../includes/footer.php' ?>
</body>
</html>

