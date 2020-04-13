<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/faq.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;

$question = $answer = "";
$db = dbConnect::getDb();


if(isset($_POST['showFaq'])){
    $id= $_POST['uid'];

    $t = new allFaq();
    $faq = $t->getFaqById($id, $db);

    if ($b) {
        header("Location: listfaq.php");
    } else {
        echo "There was a problem showing a FAQ";
    }

}

?>
<html lang="en">
<head>
    <title>Frequently Asked Questions</title>
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
    <h2>Frequently Asked Question</h2>

    <div class="faqs">
        <div>Question: <?=$faq->question ?></div>
        <div>Answer: <?=$faq->answer ?></div>
    </div>


    <div>
        <form action="updatefaq.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>"/>
            <input type="submit" name="updFaq" value="Update FAQ"/>
        </form>
        <form action="deletefaq.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="submit" class="button btn btn-primary" name="deleteFAQ" value="Delete FAQ"/>
        </form>
    </div>
</div>

<? include '../includes/footer-landing.php' ?>
</body>
</html>