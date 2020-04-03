<?php
//require_once 'autoload/composer.json';
require_once '../Classes/database.php';
require_once '../Classes/colleague.php';
use Classes\colleague as allcolleagues;
use Classes\Database as dbConnect;

//waiting to use:
//interface Addmethod {
//    public function add($coll);
//}

if(isset($_POST['addColleague'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $dbcon = dbConnect::getDb();
    $coll = new allcolleagues();
    $count = $coll->addColleague($dbcon, $fname, $lname,$department, $phone, $email);

    if($count){
        header("Location: listColleague.php");
    } else {
        echo "problem adding a colleague";
    }
}

?>

<html lang="en">

    <head>
        <title>Add A Team Member|Berryteam</title>
        <meta name="description" content="Berryteam System">
        <meta name="keywords" content="Berryteam, Colleague, Admission">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/main.css" type="text/css">
    </head>

    <body>

    <div>
        <!--    Form to Add  Colleague -->
        <form action="" method="post">

            <div class="form-group">
                <label for="fname">First Name :</label>
                <input type="text" class="form-control" name="fname" id="fname" value=""
                       placeholder="Enter first name">
                <span style="color: red">

                </span>
            </div>
            <div class="form-group">
                <label for="lname">Last Name :</label>
                <input type="text" class="form-control" name="lname" id="lname" value=""
                       placeholder="Enter last name">
                <span style="color: red">

                </span>
            </div>
            <div class="form-group">
                <label for="department">Department :</label>
                <input type="text" class="form-control" name="department" id="department" value=""
                       placeholder="Enter department">
                <span style="color: red">

                </span>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number :</label>
                <input type="text" class="form-control" name="phone" id="phone" value=""
                       placeholder="Enter phone number">
                <span style="color: red">

                </span>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="" placeholder="Enter email">
                <span style="color: red">

                </span>
            </div>
            <a href="listColleague.php" id="btn_back" class="btn btn-success float-left">Back</a>
            <button type="submit" name="addColleague"
                    class="btn btn-primary float-right" id="btn-submit">
                Add this member to your team
            </button>
        </form>
    </div>

    </body>
</html

