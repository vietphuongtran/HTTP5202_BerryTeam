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
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
<!--    <link rel="stylesheet" href="../Stylesheets/index.css">-->
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
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

    <button type="submit" name="addFaq" id="submit">Add New FAQ</button>
    <a href="listfaq.php" id="backBtn">Back to List</a>
</form>
<? include '../includes/footer-landing.php' ?>
</body>
</html>

