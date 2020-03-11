<?php
require_once 'Classes/database.php';
require_once 'Classes/discussion.php';

//generate new database connection
$dbcon = Database::getDb();
//instanciate a new instance of a class
$d = new Discussion();
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
        <div><?= $discussion ->topic ?></div>
        <div><?= $discussion ->content ?></div>
    <?php } ?>
    </body>
