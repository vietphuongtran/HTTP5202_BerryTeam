<?php
require_once '../Classes/database.php';
require_once '../Classes/discussion.php';
use Classes\Discussion as allDiscussionFunction;
use Classes\Database as dbConnect;

if(isset($_POST['deleteDiscussion'])) {
    $id = $_POST['did'];
    $db = dbConnect::getDb();

    $t = new allDiscussionFunction();
    $discussion = $t->getDiscussionById($id, $db);

    $content =  $discussion->content;
    $topic = $discussion->topic;

}
if(isset($_POST['deleteDiscussion'])) {
    $id = $_POST['tid'];
    $db = dbConnect::getDb();

    $s = new allDiscussionFunction();
    $count = $s->deleteDiscussion($id, $db);
    if ($count) {
        header("Location: listdiscussion.php");
    } else {
        echo " problem deleting";
    }
}

?>
<html lang="en">
<head>
    <title>Task management system</title>
    <meta name="description" content="Task Management System">
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<body>

<h2>Are you sure you want to delete this discussion?</h2>
<form method="POST" action="">
    <input type="hidden" name="tid" value="<?= $id; ?>" />
    <button type="submit" name="delDiscussion" id="submit">Delete</button>
    <a href="listdiscussion.php">No, go back to list</a>
</form>

</body>
</html>

