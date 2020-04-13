<?php
require_once '../Classes/database.php';
require_once '../Classes/survey.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;


if (isset($_POST['addSurvey'])) {
    $question = $_POST['question'];
    $optionA = $_POST['optionA'];
    $optionB = $_POST['optionB'];
    $optionC = $_POST['optionC'];


    $db = dbConnect::getDb();
    $t = new allSurvey();
    $c = $t->addSurvey($question, $optionA, $optionB, $optionC, $db);


    if ($c) {
        header("Location: listsurvey.php");
    } else {
        echo "There was a problem adding a Survey Question";
    }

}
?>

<html lang="en">
<head>
    <title>Add a Survey</title>
    <meta name="description" content="Survey">
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <!--    <link rel="stylesheet" href="../Stylesheets/index.css">-->
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<h1>Add New Survey</h1>
<form action="" method="post">

    <div>
        <label for="question">Question: </label>
        <input type="text" name="question" id="question">
    </div>

    <div>
        <label for="optionA">OptionA: </label>
        <input type="text" name="optionA" id="optionA" value="" >
    </div>

    <div>
        <label for="optionB">optionB: </label>
        <input type="text" name="optionB" id="optionB" value="" >
    </div>

    <div>
        <label for="optionC">optionC: </label>
        <input type="text" name="optionC" id="optionC" value="" >
    </div>

    <div>
        <label for="question">Question: </label>
        <input type="text" name="question" id="question">
    </div>

    <div>
        <label for="optionA">OptionA: </label>
        <input type="text" name="optionA" id="optionA" value="" >
    </div>

    <div>
        <label for="optionB">optionB: </label>
        <input type="text" name="optionB" id="optionB" value="" >
    </div>

    <div>
        <label for="optionC">optionC: </label>
        <input type="text" name="optionC" id="optionC" value="" >
    </div>

    <div>
        <label for="question">Question: </label>
        <input type="text" name="question" id="question">
    </div>

    <div>
        <label for="optionA">OptionA: </label>
        <input type="text" name="optionA" id="optionA" value="" >
    </div>

    <div>
        <label for="optionB">optionB: </label>
        <input type="text" name="optionB" id="optionB" value="" >
    </div>

    <div>
        <label for="optionC">optionC: </label>
        <input type="text" name="optionC" id="optionC" value="" >
    </div>

    <div>
        <label for="question">Question: </label>
        <input type="text" name="question" id="question">
    </div>

    <div>
        <label for="optionA">OptionA: </label>
        <input type="text" name="optionA" id="optionA" value="" >
    </div>

    <div>
        <label for="optionB">optionB: </label>
        <input type="text" name="optionB" id="optionB" value="" >
    </div>

    <div>
        <label for="optionC">optionC: </label>
        <input type="text" name="optionC" id="optionC" value="" >
    </div>

    <div>
        <label for="question">Question: </label>
        <input type="text" name="question" id="question">
    </div>

    <div>
        <label for="optionA">OptionA: </label>
        <input type="text" name="optionA" id="optionA" value="" >
    </div>

    <div>
        <label for="optionB">optionB: </label>
        <input type="text" name="optionB" id="optionB" value="" >
    </div>

    <div>
        <label for="optionC">optionC: </label>
        <input type="text" name="optionC" id="optionC" value="" >
    </div>

    <button type="submit" name="addQuestion" id="submit">Add New Survey </button>
    <a href="listSurvey.php" id="backBtn">Back to List</a>
</form>
<? include '../includes/footer-landing.php' ?>
</body>
</html>

