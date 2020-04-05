<?php
require_once '../Classes/quote-database.php';
require_once '../Classes/motivationquotes.php';
use Classes\Motivationquote as allmotiquotes;
use Classes\Database as dbConnect;

$quote = "";
//get a random quote
if(isset($_POST['displayMotiQuote'])) {
    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of quotes class
    $q = new allmotiquotes();
    $motiquote = $q->displayMotiQuote($dbcon);
    // ->column name in the table;
    $quote = $motiquote->quotes;
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BerryTeam|Motivation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/Stylesheets/displayMotiQuote.css">
        <link rel="stylesheet" href="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>
    <body>
        <? include '../includes/header-landing.php' ?>
        <? include '../includes/navigation.php' ?>
        <div class="color-overlay"></div>

        <div class="container">
            <div class="displayQuote">
                <h1>Quote<?= $quote; ?></h1>
            </div>
            <div class="customize">
                <a href="list.php">Customize motivation quotes</a>
            </div>
        </div>

        <footer id="footer">
            <div class="footer-content">
                <div class="copyright">
                    All right Reserved ©berryteam-4u.com
                    Developer   Paul, Ella, Lili, Ossy.
                    GitHub Repo <a href="https://github.com/vietphuongtran/HTTP5202_BerryTeam">https://github.com/vietphuongtran/HTTP5202_BerryTeam</a>
                </div>
            </div>
        </footer>

    </body>
</html>
