<?php
require_once '../Classes/database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

$fname = $lname = $department = $phone = $email = "";

if(isset($_POST['updateColleague'])) {
    $id= $_POST['uid']; //!!!!![for name!!! not $name!!!!]
    $dbcon = dbConnect::getDb();

    $coll = new allcolleagues();
    $colleagues = $coll->getColleagueById($id, $dbcon);

    $fname = $colleagues->fname;
    $lname = $colleagues->lname;
    $department = $colleagues->department;
    $phone= $colleagues->phone;
    $email = $colleagues->Email;
}

if(isset($_POST['updColleague'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = $_POST['collid'];

    $dbcon = dbConnect::getDb();
    $coll = new allcolleagues();
    $count = $coll->updateColleague($dbcon, $fname, $lname, $department, $phone, $email, $id);

    if($count){
        header("Location: listColleague.php");
    } else {
        echo "problem updating a colleague";
    }
}

?>

<html lang="en">

<head>
    <title>Update Colleague - Berryteam</title>
    <meta name="description" content="Berryteam System">
    <meta name="keywords" content="Berryteam, Colleague, Admission">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Update  Colleague -->
    <form action="" method="post">
        <input type="hidden" name="collid" value="<?= $id; ?>" />

        <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" name="fname" id="fname" value="<?= $fname; ?>"
                   placeholder="<?= $fname; ?>">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" name="lname" id="lname" value="<?= $lname; ?>"
                   placeholder="<?= $lname; ?>">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="department">Department :</label>
            <input type="text" class="form-control" name="department" id="department" value="<?= $department; ?>"
                   placeholder="<?= $department; ?>">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number :</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone; ?>"
                   placeholder="<?= $phone; ?>">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="<?= $email; ?>" placeholder="<?= $email; ?>">
            <span style="color: red">

            </span>
        </div>
        <a href="listColleague.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updColleague"
                class="btn btn-primary float-right" id="btn-submit">
            Update Colleague
        </button>
    </form>
</div>


</body>
</html

