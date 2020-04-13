<?php
require_once '../Classes/database.php';
require_once '../Classes/blog.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;


$db = dbConnect::getDb();

$count = new allblogs();
$blogs = $count->listBlog($db);


?>

<html lang="en">
<head>
    <title>Blog List</title>
    <meta name="description" content="bloglist">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<div class="maincontainer">
    <p class="h1 text-center">List All Blogs</p>

    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($blogs as $blog) { ?>
            <tr>
                <td><?= $blog['title'] ?></td>
                <td><?= $blog['content'] ?></td>

                <td>
                    <form action="update.php" method="post">
                        <input type="hidden" name="id" value="<?= $blog['id'] ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateBlog" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $blog['id'] ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteBlog" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="add.php" id="btn_addColleague" class="btn btn-success btn-lg float-right">New Colleague</a>
</div>
</div>
<? include '../includes/footer-landing.php' ?>
</body>
</html>

