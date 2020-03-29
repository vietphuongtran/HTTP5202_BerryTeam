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
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    </head>
    <body>
    <?php foreach ($dicussions as $discussion) { ?>
        <div><?= $discussion->topic ?></div>
        <div><?= $discussion->content ?></div>
        <div>
            <form action="showdiscussion.php" method="post">
                <input type="hidden" name="id" value="<?= $discussion->id ?>"/>
                <input type="submit" name="showDiscussion" value="Show details"/>
            </form>
            <form action="updatediscussion.php" method="post">
                <input type="hidden" name="id" value="<?= $discussion->id ?>"/>
                <input type="submit" name="updateDiscussion" value="Update"/>
            </form>
        </div>
    <?php } ?>
    </body>
