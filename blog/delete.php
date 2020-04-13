<?php
require_once '../Classes/database.php';
require_once '../Classes/blog.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

if(isset($_POST['deleteBlog'])) {
    $id = $_POST['id'];

    $dbcon = dbConnect::getDb();

    $t = new allBlogs();
    $count = $t->deleteBlog($db, $id);

    if($count){
        header("Location: delete.php");
    }
    else {
        echo "There was a problem deleting a Blog";
    }
}
?>

<html lang="en">
<head>
    <title>Delete a Blog</title>
    <meta name="description" content="deleteblog">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">

    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">

    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<div class="maincontainer">
    <h2>Deleted Blog Successfully</h2>
    <div>
        <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
    </div>
    <div>
        <a href="add.php" id="btn_back" class="btn btn-success float-right">Add New Blog</a>
    </div>
</div>
<? include '../includes/footer-landing.php' ?>
</body>
</html>
