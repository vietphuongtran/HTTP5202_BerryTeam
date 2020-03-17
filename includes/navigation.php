<?php

function navigation()
{
    echo "<ul id='menu'>";
    //Navigation link will be fill out later when all the page are done
    $navigation = ['Home.com' => 'Home', 'listtask.php' => 'Task', 'department.php' => 'Department', 'Meeting' => 'Meeting', 'Discussion' => 'Discussion/Survey', 'Gallery' => 'Gallery'];
    foreach ($navigation as $key => $value) {
        echo '<li><a href="#">' . $value . '</a></li>';
    }
    echo "</ul>";
}
?>
<!--<!DOCTYPE html>-->
<!--<html>-->
    <head>
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<!--    <body>-->
        <div id="nav-bar">
            <label for="mobilenav" class="show-menu">Menu</label>
            <input type="checkbox" id="mobilenav" name="mobilenav">
            <?php
            navigation();
            ?>
        </div>
<!--    </body>-->
</html>

