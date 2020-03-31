<?php
require_once '../Classes/database.php';
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
    <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
    <link rel="stylesheet" href ="../Stylesheets/landing-uniform.css">
    <link rel="stylesheet" href ="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>

    <? include '../includes/index-header.php' ?>
    <? include '../includes/navigation.php' ?>
    <body>


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
                <input type="hidden" name="id" value="<?= $faq->id ?>"/>
                <input type="submit" name="showFaq" value="Show FAQ"/>
            </form>

            <form action="updatefaq.php" method="post">
                <input type="hidden" name="id" value="<?= $faq->id ?>"/>
                <input type="submit" name="updateFaq" value="Update FAQ"/>
            </form>
        </div>

                <?php } ?>
            </div>


        <div><a href="addfaq.php" id="btn_addfaq">Add New FAQ</a></div>
        <? include '../includes/footer.php' ?>
    </body>