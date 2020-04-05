<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';
use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;

//$topic = $content = $id = "";
if(isset($_POST['updateDiscussion'])){
    $id= $_POST['id'];
    $db = dbConnect::getDb();

    $up = new allDiscussionFunction();
    $updiscussion = $up->getDiscussionById($id, $db);

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

    if($count){
        header('Location:  listdiscussion.php');
    } else {
        echo "problem updating discussion";
    }
}
?>
<html lang="en">
<head>
    <title>Task management system</title>
    <meta name="description" content="Task Management System">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/index.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<h1>Update Discussion</h1>
<form action="" method="post">
    <input type="hidden" name="tid" value="<?= $id; ?>" />
    <div>
        <label for = "topic">Topic: </label>
        <input type="text" name="topic" value ="<?=$updiscussion->topic;?>" />
    </div>
    <div>
        <label for = "content">Content: </label>
        <textarea name="content"><?=$updiscussion->content;?></textarea>
    </div>
    <button type="submit" name="updDiscuss" id="submit">Update</button>
    <a href="listdiscussion.php" id="btn_back">Back to List</a>
</form>
</body>
</html>


