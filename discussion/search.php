<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';
require_once '../Classes/comment.php';
//namespaces
use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;
use Classes\Comment as allComment;
$db = dbConnect::getDb();
if (isset($_POST['searchDiscussion'])) {
    $searchWord = "%{$_POST['searchWord']}%";
    $db = dbConnect::getDb();
    $d = new allDiscussionFunction();
    $discussions = $d->searchDiscussion($searchWord, $db);
    $c = new allComment();
    if ($discussions == "" || $discussions == null) {
        $errorMsg = "No result, please change your search keyword and try again.";
    }
}

?>
<html lang="en">
<head>
    <title>Berry Team Management System</title>
    <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/discussion.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
    <div class="contentContainer">
        <div class="discussionContainer">
            <div class="discussionH2"><h2>Search result:</h2></div>
            <div class="errorMsg"><?$errorMsg?></div>
            <?php foreach ($discussions as $discussion) { ?>
                <div><?= $discussion->topic ?></div>
                <div><?= $discussion->content ?></div>

                <div>
                    <form action="show.php" method="post">
                        <input type="hidden" name="id" value="<?= $discussion->id ?>"/>
                        <input type="submit" class="showButton" name="showDiscussion" value="Show details"/>
                    </form>
                    <form action="update.php" method="post">
                        <input type="hidden" name="id" value="<?= $discussion->id ?>"/>
                        <input type="submit" class="updateButton" name="updateDiscussion" value="Update"/>
                    </form>

                </div>
                <?
                $id = $discussion->id;
                $comments = $c->getCommentByDiscussionId($id, $db);
                ?>
                <?php foreach ($comments as $comment) { ?>
                    <div><?=$comment->comment?></div>
                <? } ?>
                <!--Adding comment here create post back that will erase all show discussion-->
                <!--Sollution: Create a adding comment page and all the topic of discussion will appear in dropdown list-->
                <div><a href="addcomment.php">Add your comment</a></div>
            <?php } ?>
            <a href="list.php">Back to List</a>
        </div>
    </div>
<? include '../includes/footer-landing.php' ?>
</body>
</html>


