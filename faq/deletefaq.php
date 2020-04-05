<?php
require_once '../Classes/database.php';
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
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/index.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<body>
<? include '../includes/header-index.php' ?>
<? include '../includes/navigation.php' ?>
<h2>Are you sure you want to delete this faq?</h2>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $id; ?>" />
    <button type="submit" name="deleteFaq" id="submit">Delete FAQ</button>
    <a href="listfaq.php">No, go back to list</a>
</form>
<? include '../includes/footer-landing.php' ?>
</body>
</html>

