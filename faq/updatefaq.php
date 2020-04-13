<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/survey.php';

use Classes\survey as allSurvey;
use Classes\database as dbConnect;


if (isset($_POST['addSurvey'])) {
    $question = $_POST['question'];
    $optionA = $_POST['optionA'];
    $optionB = $_POST['optionB'];
    $optionC = $_POST['optionC'];


    $db = dbConnect::getDb();
    $surv = new allSurvey();
    $count = $surv->addSurvey($question, $optionA, $optionB, $optionC, $db);


    if ($count) {
        header("Location: listfaq.php");
    } else {
        echo "There was a problem adding a Survey";
    }

}
?>
<html lang="en">
<head>
    <title>Add Survey</title>
    <meta name="description" content="Survey">
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
    <h1>Add New Survey </h1>
    <form action="" method="post">

        <div>
            <label for="question">Question: </label>
            <input type="text" name="question" id="question">
        </div>

        <div>
            <label for="answer">Answer: </label>
            <input type="text" name="answer" id="answer">
        </div>

        <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addSurvey" class="btn btn-primary float-right" id="btn-submit">Add New Survey</button>
    </form>
</div>

<? include '../includes/footer-landing.php' ?>
</body>
</html>

