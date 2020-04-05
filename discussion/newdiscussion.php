<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';
use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;

if(isset($_POST['addDiscuss'])) {
    $topic = $_POST['topic'];
    $content = $_POST['content'];

    $db = dbConnect::getDb();
    $dis = new allDiscussionFunction();
    $count = $dis->addDiscussion($content, $topic, $db);

    if ($count) {
        header('Location:  listdiscussion.php');
    } else {
        echo "problem addiing discussion";
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
        <div>
            <label for = "topic">Topic: </label>
            <input type="text" name="topic"/>
        </div>
        <div>
            <label for = "content">Content: </label>
            <textarea name="content"></textarea>
        </div>
        <button type="submit" name="addDiscuss">Adding</button>
        <a href="listdiscussion.php" id="btn_back">Back to List</a>
    </form>
    </body>
</html>
