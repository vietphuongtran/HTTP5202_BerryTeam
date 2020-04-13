<?php
require_once '../Classes/database.php';
require_once '../Classes/faq.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;


if (isset($_POST['addFaq'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];


    $db = dbConnect::getDb();
    $t = new allFaq();
    $c = $t->addFaq($question, $answer, $db);


    if ($c) {
        header("Location: listfaq.php");
    } else {
        echo "There was a problem adding FAQ";
    }

}
?>
<html lang="en">
<head>
    <title>Add FAQ</title>
    <meta name="description" content="Frequently Asked Questions">
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
    <h1>Add New FAQ</h1>
    <form action="" method="post">

        <div>
            <label for="question">Question: </label>
            <input type="text" name="question" id="question">
        </div>

        <div>
            <label for="answer">Answer: </label>
            <input type="text" name="answer" id="answer">
        </div>

        <a href="listfaq.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addFaq" class="btn btn-primary float-right" id="btn-submit">Add New FAQ</button>
    </form>
</div>

<? include '../includes/footer-landing.php' ?>
</body>
</html>


