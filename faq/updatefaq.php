<?php
require_once '../Classes/database.php';
require_once '../Classes/faq.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;

$question = $answer = "";

if(isset($_POST['updFaq'])){
    $id= $_POST['id'];
    $db = dbConnect::getDb();

    $t = new allFaq();
    $faq = $t->getFaqById($id, $db);

    $question =  $faq->question;
    $answer = $faq->answer;


}
if(isset($_POST['upFaq'])){
    $id= $_POST['tid'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];


    $db = dbConnect::getDb();
    $s = new allFaq();
    $count = $s->updateFaq($id, $question, $answer, $db);

    if($count){
        header('Location: listfaq.php');
    } else {
        echo "There was a problem updating FAQ";
    }
}
?>
<html lang="en">
<head>
    <title>Frequently Asked Questions</title>
    <meta name="description" content="Frequently Asked Questions">
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/index.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include "header.php" ?>
<? include '../includes/navigation.php' ?>

<h1>Update a FAQ</h1>
<form action="" method="post">
    <input type="hidden" name="tid" value="<?= $id; ?>" />
    <div>
        <label for = "question">Question: </label>
        <input type="text" name="question" id="question" value ="<?= $question; ?>">
    </div>
    <div>
        <label for = "answer">Answer </label>
        <textarea name="answer" id="answer"><?= $answer; ?></textarea>
    </div>

    <button type="submit" name="upFaq" id="submit">Update FAQ</button>
    <a href="listfaq.php" id="backBtn">Back to List</a>
</form>
<? include "footer-landing.php" ?>
</body>
</html>
