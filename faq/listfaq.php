<?php
require_once '../Classes/databaseserver.php';
require_once '../Classes/faq.php';

use Classes\faq as allFaq;
use Classes\database as dbConnect;

$db = dbConnect::getDb();

$t = new allFaq();
$faqs = $t->showAllFaq($db);

?>

<html lang="en">
<head>
    <title>FAQ List</title>
    <meta name="description" content="Frequently Asked Questions">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>

<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<body>
<div class="maincontainer">
    <h2>FAQ BerryTeam</h2>
    <p> Search our FAQs below </p>
    <div class="faqs">
        <div>Frequent Asked Questions</div>
        <?php foreach ($faqs as $faq) { ?>
        <div><?= $faq ->question?></div>
        <div><?= $faq ->answer?></div>
    </div>
    <div>
        <form action="showfaq.php" method="post">
            <input type="hidden" name="uid" value="<?= $faq->id ?>"/>
            <input type="submit" name="showFaq" value="Show FAQ"/>
        </form>


    </div>

    <?php } ?>
    <div><a href="addfaq.php" id="btn_addfaq">Add New FAQ</a></div>

</div>

<? include '../includes/footer-landing.php' ?>
</body>