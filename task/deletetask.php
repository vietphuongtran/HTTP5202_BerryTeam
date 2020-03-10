<?php
require_once 'Class/database.php';
require_once 'Class/task.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = Database::getDb();

    $t = new Task();
    $task = $t->getTaskById($id, $db);

    $name =  $task->name;
    $description = $task->description;
    $status = $task->status;

}
if(isset($_POST['delTask'])) {
    $id = $_POST['tid'];
    $db = Database::getDb();

    $s = new Task();
    $count = $s->deleteTask($id, $db);
    if ($count) {
        header("Location: listtask.php");
    } else {
        echo " problem deleting";
    }
}

?>
<html lang="en">
<head>
    <title>Task management system</title>
    <meta name="description" content="Student Management System">
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href="../Stylesheets/header.css">
    <link rel="stylesheet" href="../Stylesheets/footer.css">
</head>
<body>
    <h2>Are you sure you want to delete <?= $name; ?> task?</h2>
    <form method="POST" action="">
        <input type="hidden" name="tid" value="<?= $id; ?>" />
        <button type="submit" name="delTask" id="submit">Delete</button>
        <a href="listtask.php">No, go back to list</a>
    </form>
</body>
