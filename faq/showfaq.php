<?php
require_once '../Classes/database.php';
require_once '../Classes/faq.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;

    $question = $answer = "";
    $db = dbConnect::getDb();


    if(isset($_POST['showFaq'])){
    $id= $_POST['uid'];

    $t = new allFaq();
    $faq = $t->getFaqById($id, $db);

//    if ($b) {
//        header("Location: listfaq.php");
//    } else {
//        echo "There was a problem showing a FAQ";
//    }

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--        <script src="assignEmployee.js"></script>-->
</head>
<body>
<? include '../includes/header-index.php' ?>
<? include '../includes/navigation.php' ?>

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
<? include '../includes/footer-landing.php' ?>
</body>
</html>