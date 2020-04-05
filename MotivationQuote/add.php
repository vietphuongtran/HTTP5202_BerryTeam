<?php
//require_once 'autoload/composer.json';
require_once '../Classes/quote-database.php';
require_once '../Classes/motivationquotes.php';
use Classes\Motivationquote as allmotiquotes;
use Classes\Database as dbConnect;

//waiting to use:
//interface Addmethod {
//    public function add($coll);
//}

$quoteerr = "";
if(isset($_POST['addMotiQuotes'])) {
    $quotes = $_POST['quotes'];
    $category = $_POST['category'];
    //error messages
    if ($quotes == "") {
        $quoteerr = "Required field";
    } else {
        $quoteerr = "";
    }

    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of quotes class
    $quote = new allmotiquotes();
    $count = $quote->addMotiQuotes($dbcon, $quotes, $category);
    if ($count) {
        header("Location: list.php");
    } else {
        echo "Problem adding a motivation quote...";
    }
}
?>

<html lang="en">
    <head>
        <title>Add Your Motivation Quotes|Berryteam</title>
        <meta name="description" content="Berryteam System">
        <meta name="keywords" content="Berryteam, Motivation, Quotes">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/CSS/main.css" type="text/css">

        <link rel="stylesheet" href="/Stylesheets/taskcrud.css">
        <link rel="stylesheet" href="/Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="/Stylesheets/navigation.css">
    </head>
    <body>
        <? include '../includes/header-index.php' ?>
        <? include '../includes/navigation.php' ?>
        <div>
            <h1>Create your own motivation quotes</h1>
            <!--    Form to Add a Motivation Quote    -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="quotes">Input your motivation quote </label>
                    <input type="text" class="form-control" name="quotes" id="quotes" value=""
                           placeholder="Add your customized motivation quote here">
                    <span style="color: red">
                        <?= $quoteerr; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="category">Give it a category</label>
                    <input type="text" class="form-control" name="category" id="category" value=""
                           placeholder="Movie? Music? Or novel? Default category: other">
                    <span style="color: red">

                    </span>
                </div>

                <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
                <button type="submit" name="addMotiQuotes"
                        class="btn btn-primary float-right" id="btn-submit">
                    Add this quote
                </button>
            </form>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>