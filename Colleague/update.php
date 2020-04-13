<?php
//require_once '../Classes/database.php';
require_once '../Classes/database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

$fname = $lname = $department = $phone = $email = "";
$fnameerr = $lnameerr = $departmenterr = $phoneerr = $emailerr = "";

//get current database
if(isset($_POST['updateColleague'])) {
    $id= $_POST['uid'];
    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of colleague class
    $coll = new allcolleagues();
    $colleagues = $coll->getColleagueById($id, $dbcon);

    $fname = $colleagues->fname;
    $lname = $colleagues->lname;
    $department = $colleagues->department;
    $phone= $colleagues->phone;
    $email = $colleagues->email;
}

//update database
if(isset($_POST['updColleague'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = $_POST['collid'];

    //validation & error messages:
    //first name input validation
    if ($fname == "") {
        $fnameerr = "Required field";
    } else {
        $fnameerr = "";
    }
    //last name input validation
    if ($lname == "") {
        $lnameerr = "Required field";
    } else {
        $lnameerr = "";
    }
    //department input validation
    if ($department == "") {
        $departmenterr = "Required field";
    } else {
        $departmenterr = "";
    }
    //phone input validation
    $phoneRegex = "/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/";
    if ($phone == "") {
        $phoneerr = "Required field";
    } else if (!preg_match($phoneRegex, $phone)) {
        $phoneerr = "Valid phone number required. e.g. 416-000-0000";
    } else {
        $phoneerr = "";
    }
    //email input validation
    if ($email == "") {
        $emailerr = "Required field";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = "Valid email required. e.g. me@mail.com";
    } else {
        $emailerr = "";
    }

    //new database connection
    $dbcon = dbConnect::getDb();
    //new instance of colleague class
    $coll = new allcolleagues();
    $count = $coll->updateColleague($dbcon, $fname, $lname, $department, $phone, $email, $id);
    if($count){
        header("Location: list.php");
    } else {
        echo "Problem updating this team member...";
    }
}
?>

<html lang="en">
<head>
    <title>Edit Team member|Berryteam</title>
    <meta name="description" content="Berryteam System">
    <meta name="keywords" content="Berryteam, Colleague, Admission">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<div class="maincontainer">
    <h1>Edit team member <?= $fname; ?> <?= $lname; ?> information</h1>
    <!--    Form to Update  Colleague -->
    <form action="" method="post">
        <input type="hidden" name="collid" value="<?= $id; ?>" />

        <div class="form-group">
            <label for="fname">First Name :</label>
            <input type="text" class="form-control" name="fname" id="fname" value="<?= $fname; ?>"
                   placeholder="<?= $fname; ?>">
            <span style="color: red">
                        <?= $fnameerr; ?>
                    </span>
        </div>
        <div class="form-group">
            <label for="lname">Last Name :</label>
            <input type="text" class="form-control" name="lname" id="lname" value="<?= $lname; ?>"
                   placeholder="<?= $lname; ?>">
            <span style="color: red">
                        <?= $lnameerr; ?>
                    </span>
        </div>
        <div class="form-group">
            <label for="department">Department :</label>
            <input type="text" class="form-control" name="department" id="department" value="<?= $department; ?>"
                   placeholder="<?= $department; ?>">
            <span style="color: red">
                        <?= $departmenterr; ?>
                    </span>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number :</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone; ?>"
                   placeholder="<?= $phone; ?>">
            <span style="color: red">
                        <?= $phoneerr; ?>
                    </span>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="<?= $email; ?>" placeholder="<?= $email; ?>">
            <span style="color: red">
                        <?= $emailerr; ?>
                    </span>
        </div>
        <a href="list.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updColleague"
                class="btn btn-primary float-right" id="btn-submit">
            Save
        </button>
    </form>
</div>
<? include '../includes/footer-landing.php' ?>
</body>
</html

