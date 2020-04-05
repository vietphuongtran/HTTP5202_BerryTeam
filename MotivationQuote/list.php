<?php
require_once '../Classes/quote-database.php';
require_once '../Classes/motivationquotes.php';
use Classes\Motivationquote as allmotiquotes;
use Classes\Database as dbConnect;

//new database connection
$dbcon = dbConnect::getDb();
//new instance of quotes class
$q = new allmotiquotes();
$motiquotes = $q->listQuotes($dbcon);
?>

<html lang="en">
    <head>
        <title>Default motivation quotes|Berryteam</title>
        <meta name="description" content="Berryteam">
        <meta name="keywords" content="Berryteam, motivation, quotes, default">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
        <link rel="stylesheet" href="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>
    <body>
        <? include '../includes/header-landing.php' ?>
        <? include '../includes/navigation.php' ?>
        <h1 class="h1 text-center">Default motivation quotes</h1>
        <div class="m-1">
            <!--    Displaying Data in Table-->
            <table class="table table-bordered tbl">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Quotes</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($motiquotes as $motiquote) { ?>
                    <tr>
                        <td><?= $motiquote['id'] ?></td>
                        <td><?= $motiquote['quotes'] ?></td>
                        <td><?= $motiquote['category'] ?></td>
                        <td>
                            <form action="update.php" method="post">
                                <input type="hidden" name="id" value="<?= $motiquote['id'] ?>"/>
                                <input type="submit" class="button btn btn-primary" name="updateMotiQuote" value="Update"/>
                            </form>
                        </td>
                        <td>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= $motiquote['id'] ?>"/>
                                <input type="submit" class="button btn btn-danger" name="deleteMotiQuote" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="add.php" id="btn_addMotiQuote" class="btn btn-success btn-lg float-right">Create your own motivation team quotes</a>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>