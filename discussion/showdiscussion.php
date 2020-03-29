<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';

use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;
//generate new database connection
$db = dbConnect::getDb();
//instanciate a new instance of a class

    if(isset($_POST['showDiscussion'])){
        $id = $_POST['id'];
        $d = new allDiscussionFunction();
        $discussion =  $d->getDiscussionById($db, $id);
    }
?>

<html>
    <head>

    </head>
    <body>
        <div><?=$discussion->topic?></div>
        <div><?=$discussion->content?></div>
    </body>
</html>
