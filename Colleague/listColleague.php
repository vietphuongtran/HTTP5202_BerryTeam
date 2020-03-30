<?php
require_once '../Classes/database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

$dbcon = dbConnect::getDb();

$c = new allcolleagues();
$colleagues = $c->listColleague($dbcon);

$searchContent = "";

?>

<html lang="en">
<head>
    <title>List of colleagues</title>
    <meta name="description" content="Berryteam">
    <meta name="keywords" content="Berryteam, Colleague, Admission">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<p class="h1 text-center">Berryteam</p>

<!--    search colleagues   -->
<div class="s-1">
    <form action="searchColleague.php" method="post">
        <input type="text" name="searchContent" value="<?= $searchContent ?>">
        <input type="submit" class="button btn btn-primary" name="searchColleague" value="Search"/>
    </form>

</div>

<div class="m-1">
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
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
                <td><?= $colleague['Email'] ?></td>
                <td>
                    <form action="updateColleague.php" method="post">
                        <input type="hidden" name="uid" value="<?= $colleague['id'] ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateColleague" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteColleague.php" method="post">
                        <input type="hidden" name="id" value="<?= $colleague['id'] ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteColleague" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="addColleague.php" id="btn_addColleague" class="btn btn-success btn-lg float-right">New Colleague</a>
</div>
</body>
</html>