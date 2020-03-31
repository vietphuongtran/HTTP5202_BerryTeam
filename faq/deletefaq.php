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
    $id = $_POST['tid'];
    $db = dbConnect::getDb();

    $s = new allFaq();
    $count = $s->deleteFaq($id, $db);
    if ($count) {
        header("Location: listfaqs.php");
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
    <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<body>
<? include '../includes/index-header.php' ?>
<? include '../includes/navigation.php' ?>
<h2>Are you sure you want to delete <?= $question; ?> faq?</h2>
<form method="POST" action="">
    <input type="hidden" name="tid" value="<?= $id; ?>" />
    <button type="submit" name="delTask" id="submit">Delete FAQ</button>
    <a href="listtask.php">No, go back to list</a>
</form>
<? include '../includes/footer.php' ?>
</body>
</html>

