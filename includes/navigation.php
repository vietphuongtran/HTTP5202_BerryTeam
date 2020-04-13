<?php

function navigation()
{
    echo "<ul id='menu'>";
    //Navigation link will be fill out later when all the page are done
    $navigation = ['../index.php' => 'Home', '../task/list.php' => 'Task', '../Colleague/list.php' => 'Teammates', 'Meeting' => 'Meeting', '../discussion/list.php' => 'Discussion/Survey', '../gallery/gallery.php' => 'Gallery'];
    foreach ($navigation as $key => $value) {
        echo '<li><a href="'.$key.'">' . $value . '</a></li>';
    }
    echo "</ul>";
}
?>

<div id="nav-bar">
    <label for="mobilenav" class="show-menu">Menu</label>
    <input type="checkbox" id="mobilenav" name="mobilenav">
    <?php
    navigation();
    ?>
</div>


