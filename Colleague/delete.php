<?php
//require_once '../Classes/database.php';
require_once '../Classes/quote-database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

if(isset($_POST['deleteColleague'])) {
    $id = $_POST['id'];
    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of colleague class
    $coll = new allcolleagues();
    $count = $coll->deleteColleague($dbcon, $id);

    if($count){
        header("Location: delete.php");
    }
    else {
        echo "Problem deleting this team member...";
    }
}
?>

<html lang="en">
    <head>
        <title>Delete team member|Berryteam</title>
        <meta name="description" content="Berryteam System">
        <meta name="keywords" content="Berryteam, motivation, quote">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/main.css" type="text/css">

        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
        <link rel="stylesheet" href="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>
    <body>
        <? include '../includes/header-index.php' ?>
        <? include '../includes/navigation.php' ?>
        <div>
            <h2>Deleted team member successfully</h2>
            <div>
                <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
            </div>
            <div>
                <a href="add.php" id="btn_back" class="btn btn-success float-right">Add new team member</a>
            </div>
        </div>
    </body>
</html>

