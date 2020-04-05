<?php
//require_once '../Classes/database.php';
require_once '../Classes/quote-database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

$errormsg = "";
if(isset($_POST['searchColleague'])) {
    //get input search key
    $searchContent = $_POST['searchContent'];
    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of colleague class
    $coll = new allcolleagues();
    $colleagues = $coll->searchColleague($dbcon, $searchContent);

    //error message
    if ($colleagues == "" || $colleagues == null) {
        $errormsg = "No result, please change your search keyword and try again.";
    }
}
?>

<html lang="en">
    <head>
        <title>Search Result|Berryteam</title>
        <meta name="description" content="Berryteam">
        <meta name="keywords" content="Berryteam, Colleague, Admission">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="../Stylesheets/taskcrud.css">
        <link rel="stylesheet" href="../Stylesheets/uniform.css">
        <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    </head>
    <body>
        <? include '../includes/header-landing.php' ?>
        <? include '../includes/navigation.php' ?>
        <p class="h1 text-center">Berryteam </p>
        <p>Search result</p>
        <div class="m-1">
            <div><?= $errormsg; ?></div>
            <!--    Displaying Data in Table-->
            <table class="table table-bordered tbl">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($colleagues as $colleague) { ?>
                    <tr>
                        <th><?= $colleague['id'] ?></th>
                        <td><?= $colleague['fname'] ?></td>
                        <td><?= $colleague['lname'] ?></td>
                        <td><?= $colleague['department'] ?></td>
                        <td><?= $colleague['phone'] ?></td>
                        <td><?= $colleague['email'] ?></td>
                        <td>
                            <form action="update.php" method="post">
                                <input type="hidden" name="id" value="<?= $colleague['id'] ?>"/>
                                <input type="submit" class="button btn btn-primary" name="updateColleague" value="Update"/>
                            </form>
                        </td>
                        <td>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= $colleague['id'] ?>"/>
                                <input type="submit" class="button btn btn-danger" name="deleteColleague" value="Delete"/>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div name="endresult">
                --- end ---
            </div>
            <a href="list.php" id="btn_back" class="btn btn-success ">Back</a>
            <a href="add.php" id="btn_addColleague" class="btn btn-success btn-lg float-right">Add a new team member</a>
        </div>
        <? include '../includes/footer-landing.php' ?>
    </body>
</html>


