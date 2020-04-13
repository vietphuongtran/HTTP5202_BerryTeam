<?php
require_once '../Classes/database.php';
require_once '../Classes/blog.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

$title = $content = "";
$titleerr = $contenterr = "";

//get actual db
if(isset($_POST['updateBlog'])) {
    $id= $_POST['uid'];

    $db = dbConnect::getDb();

    $c = new allblogs();
    $blogs = $c->getBlogById($id, $db);

    $title = $blogs->title;
    $content = $blogs->content;

}

//update db
if(isset($_POST['updBlog'])) {
    $title = $_POST['title'];
    $content= $_POST['content'];
    $id = $_POST['updateid'];


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


    //new database connection
    $db= dbConnect::getDb();

    $c = new allcolleagues();
    $count = $c->updateBlog($db, $title, $content, $id);
    if($count){
        header("Location: list.php");
    } else {
        echo "There was a problem updating a Blog";
    }
}
?>

<html lang="en">
<head>
    <title>Update a Blog</title>
    <meta name="description" content="updateblog">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<div class="maincontainer">
    <h1>Update Blog <?= $title; ?> <?= $content; ?></h1>

    <form action="" method="post">
        <input type="hidden" name="blogid" value="<?= $id; ?>" />

        <label for="title">Title</label></br>
        <input type="text" id="title" name="title" value="<?= $title; ?>"/><br/>

        <label for=""content>Content</label></br>
        <textarea id="content" name="content" rows="20" cols="50" value=""<?= $content; ?>"></textarea><br/>



        <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updColleague"
                class="btn btn-primary float-right" id="btn-submit">
            Save
        </button>
    </form>
</div>
<? include '../includes/footer-landing.php' ?>
</body>
</html

