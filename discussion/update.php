<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';
use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;

//$topic = $content = $id = "";
if(isset($_POST['updateDiscussion'])){
    $id= $_POST['id'];
    $db = dbConnect::getDb();

    $d = new allDiscussionFunction();
    $updiscussion =  $d->getDiscussionById($db, $id);

//    $topic =  $discussion->topic;
//    $content = $discussion->content;
}
if(isset($_POST['updDiscuss'])){
    $id= $_POST['tid'];
    $topic = $_POST['topic'];
    $content = $_POST['content'];

    $db = dbConnect::getDb();
    $dis = new allDiscussionFunction();
    $count = $dis->updateDiscussion($id, $content, $topic, $db);
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
    if($count & empty($infoErr)){
        header('Location:  list.php');
    } else {
        echo "problem updating discussion";
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
                <div class="discussionH2"><h2>Update Discussion</h2></div>
                <form action="" method="post">
                    <input type="hidden" name="tid" value="<?= $id; ?>" />
                    <div>
                        <div><label for = "topic">Topic: </label></div>
                        <input type="text"  class="inputfield" name="topic" value ="<?=$updiscussion->topic;?>" />
                        <div class="errorMsg"><?=$infoErr?></div>
                    </div>
                    <div>
                        <div><label for = "content">Content: </label></div>
                        <textarea name="content" class="textareafield"><?=$updiscussion->content;?></textarea>
                        <div class="errorMsg"><?=$infoErr?></div>
                    </div>
                    <button type="submit" class="updateButton" name="updDiscuss" id="submit">Update</button>
                    <a href="list.php" id="btn_back">Back to List</a>
                </form>
            </div>
        </div>
    <? include '../includes/footer.php' ?>
    </body>
</html>


