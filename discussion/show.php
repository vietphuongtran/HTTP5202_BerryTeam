<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/discussion.php';
require_once '../Classes/comment.php';

use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;
use Classes\Comment as allComment;
//generate new database connection
$db = dbConnect::getDb();
//instanciate a new instance of a class

    if(isset($_POST['showDiscussion'])){
        $id = $_POST['id'];
        $d = new allDiscussionFunction();
        $discussion =  $d->getDiscussionById($db, $id);
        $c = new allComment();
        $comments = $c->getCommentByDiscussionId($id, $db);
    }
?>

<html>
    <head>
        <title>Task management system</title>
        <meta name="description" content="Task Management System">
        <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/discussion.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
    <? include '../includes/header-landing.php' ?>
    <? include '../includes/navigation.php' ?>
        <div class="contentContainer">
            <div class="discussionContainer">
                <div class="discussionH2"><h2>Discussion Detail</h2></div>
                <div><?=$discussion->topic?></div>
                <div><?=$discussion->content?></div>
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>" />
                    <input type="submit" class="updateButton" name="updateDiscussion" value="Update"/>
                </form>
                <form action="delete.php" method="post">
                    <input type="hidden" name="did" value="<?= $id ?>" />
                    <input type="submit" class="showButton" name="deleteDiscuss" value="Delete"/>
                </form>
                <?php foreach ($comments as $comment) { ?>
                    <div>
                    <form action="deletecomment.php" method="post">
                        <?=$comment->comment ?>
                        <input type="hidden" name="cid" value="<?=$comment->commentID?>" />
                        <span><button type="submit" name="deleteComment" class="showButton"><i class="fa fa-trash"></span>  Delete<span></i></button></span>
                    </form>
                    </div>
                <? } ?>
                <form action="addcomment.php" method="post">
                    <input type="hidden" name="commentid" value="<?= $id ?>" />
                    <input type="submit" class="updateButton" name="addComment" value="Adding comment"/>
                </form>
                <!--Adding comment here create post back that will erase all show discussion-->
                <!--Sollution: Create a adding comment page and all the topic of discussion will appear in dropdown list-->
            </div>
        </div>
    <? include '../includes/footer-landing.php' ?>
    </body>
</html>
