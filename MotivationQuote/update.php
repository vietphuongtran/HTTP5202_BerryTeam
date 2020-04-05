<?php
require_once '../Classes/database.php';
require_once '../Classes/motivationquotes.php';
use Classes\Motivationquote as allmotiquotes;
use Classes\Database as dbConnect;

$id = $quote = $category = "";

//get previous data
if(isset($_POST['updateMotiQuote'])) {
    $id = $_POST['id'];
    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of quotes class
    $upq = new allmotiquotes();
    $upmotiquotes = $upq->getMotiQuoteById($id, $dbcon);

    // ->column name in the table;
    $upquote = $upmotiquotes->quotes;
    $upcategory = $upmotiquotes->category;
}

//update data
if(isset($_POST['updMotiQuote'])) {
    $quote = $_POST['quote'];
    $category = $_POST['category'];
    $id = $_POST['motiquoteid'];

    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of quotes class
    $q = new allmotiquotes();
    $count = $q->updateMotiQuote($dbcon, $quote, $category, $id);
    if($count){
        header("Location: list.php");
    } else {
        echo "Problem updating this motivation quote...";
    }
}
?>

<html lang="en">
    <head>
        <title>Edit motivation quote|Berryteam</title>
        <meta name="description" content="Berryteam System">
        <meta name="keywords" content="Berryteam, motivation, quote">
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
            <!--    Form to Update current quote -->
            <form action="" method="post">
                <input type="hidden" name="motiquoteid" value="<?= $id; ?>" />

                <div class="form-group">
                    <!--            <label for="quote">First Name :</label>-->
                    <input type="text" class="form-control" name="quote" id="quote" value="<?= $quote; ?>"
                           placeholder="<?= $upquote; ?>">
                    <span style="color: red">

                    </span>
                </div>
                <div class="form-group">
                    <!--            <label for="lname">Last Name :</label>-->
                    <input type="text" class="form-control" name="category" id="category" value="<?= $category; ?>"
                           placeholder="<?= $upcategory; ?>">
                    <span style="color: red">

                    </span>
                </div>

                <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
                <button type="submit" name="updMotiQuote" class="btn btn-primary float-right" id="btn-submit">
                    Save changes
                </button>
            </form>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html

