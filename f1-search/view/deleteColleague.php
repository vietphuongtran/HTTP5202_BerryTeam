<?php
require_once '../Classes/database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

if(isset($_POST['deleteColleague'])) {
    $id = $_POST['id']; //!!!!![for name!!! not $name!!!!
    $dbcon = dbConnect::getDb();

    $coll = new allcolleagues();
    $count = $coll->deleteColleague($dbcon, $id);
    if($count){
        header("Location: listColleague.php");
    }
    else {
        echo " problem deleting";
    }
}
