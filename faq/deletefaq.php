<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/faq.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = dbConnect::getDb();

    $t = new allFaq();
    $faq = $t->getFaqById($id, $db);

    $question =  $faq->question;
    $answer = $faq->answer;

}
if(isset($_POST['deleteFaq'])) {
    $id = $_POST['id'];
    $db = dbConnect::getDb();

    $s = new allFaq();
    $count = $s->deleteFaq($id, $db);
    if ($count) {
        header("Location: listfaq.php");
    } else {
        echo "There was a problem deleting FAQ";
    }
}

?>
<html lang="en">
<head>
    <title>Frequent Asked Questions</title>
    <meta name="description" content="FAQdelete">
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
    <h2>Are you sure you want to delete this FAQ?</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $id; ?>" />



        <a href="listfaq.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addFaq" class="btn btn-primary float-right" id="btn-submit">DeleteFAQ</button>


    </form>
</div>

<? include '../includes/footer-landing.php' ?>
</body>
</html>

