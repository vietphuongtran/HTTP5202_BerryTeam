<?php
require_once '../Classes/database.php';
require_once '../Classes/blog.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;

$titleerr = $contenterr = "";
if (isset($_POST['addBlog'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    //errors
    if ($title == "") {
        $titleerr = "Required field";
    } else {
        $titleerr = "";
    }

    if ($content == "") {
        $contenterr = "Required field";
    } else {
        $contenterr = "";
    }


    $db = dbConnect::getDb();
    $t = new allBlogs();
    $count = $t->addBlog($title, $content, $db);


    if ($count) {
        header("Location: list.php");
    } else {
        echo "There was a problem adding a Blog";
    }

}
?>

<html lang="en">
<head>
    <title>Add Blog</title>
    <meta name="description" content="AddBlog">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<h1>Add New Blog</h1>
<form action="" method="post">
    <label for="title">Title</label></br>
    <input type="text" id="title" name="post[title]" value=""/><br/>

    <label for=""content>Content</label></br>
    <textarea id="content" name="post[content]" rows="20" cols="50"></textarea><br/>


    <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
    <button type="submit" name="addBlog" class="btn btn-primary float-right" id="btn-submit">Add New Blog</button>

</form>
<? include '../includes/footer-landing.php' ?>
</body>
</html>

