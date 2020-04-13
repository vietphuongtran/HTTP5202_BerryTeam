<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';

use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;
//generate new database connection
$dbcon = dbConnect::getDb();
//instanciate a new instance of a class
$d = new allDiscussionFunction();
$dicussions =  $d->showAllDiscussions($dbcon);
?>

<html lang="en">
    <head>
        <title>Berry Team</title>
        <meta name="description" content="Task Management System">
        <meta name="description" content="Task Management System">
        <link rel="stylesheet" href ="../Stylesheets/discussion.css">
        <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
        <link rel="stylesheet" href ="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    </head>
    <body>
    <? include '../includes/header-landing.php' ?>
    <? include '../includes/navigation.php' ?>
    <div class="contentContainer">
        <div class="discussionContainer">
            <div class="discussionH2"><h2>Discussion list</h2></div>
            <div>
                <form method="post" action="search.php">
                    <input type="text" name="searchWord" />
                    <input type="submit" class="showButton" name="searchDiscussion" value="Search for discussion"/>
                </form>
            </div>
            <?php foreach ($dicussions as $discussion) { ?>
                <div><?= $discussion->topic ?></div>
                <div><?= $discussion->content ?></div>
<!--                <div>-->
<!--                    --><?php //foreach ($commentCounts as $key => $value) { ?>
<!--                    --><?//$value?><!-- people has replied to this thread</div>-->
<!--                --><?// } ?>
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
            <?php } ?>
            <a href="add.php">Add a discussion</a>
        </div>
    </div>
    <? include '../includes/footer-landing.php' ?>
    </body>
</html>
