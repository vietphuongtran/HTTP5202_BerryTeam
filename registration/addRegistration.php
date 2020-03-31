<!DOCTYPE html>
<?php
require_once 'Classes/database.php';
require_once 'Classes/registration.php';
use Classes\Database;
use Classes\Registration;

$nameerr = "";
$unameerr = "";
$passerr = "";
$emailerr = "";
$phoneerr = "";

$errorsending = false;

$phonepattern = '/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i';


if(isset($_POST['register'])) {

    if($_POST['name'] == "") {
        $nameerr = "Please Enter a Name";
        $errorsending = true;
    }
    if($_POST['username'] == "") {
        $unameerr = "Please Enter a UserName";
        $errorsending = true;
    }
    if($_POST['regpassword'] == "") {
        $passerr = "Please Enter a Password";
        $errorsending = true;
    }
    if($_POST['email'] == "") {
        $emailerr = "Please Enter an Email";
        $errorsending = true;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailerr = "Please enter a valid email format";
        $errorsending = true;
    }
    if($_POST['phone'] == "") {
        $phoneerr = "Please Enter a Phone Number";
        $errorsending = true;
    } else if (!preg_match($phonepattern, $_POST['phone'])) {
        $phoneerr = "Please enter a valid phone number ex.(000-000-0000)";
        $errorsending = true;
    }
    if($errorsending != true) {
        $dbcon = Database::getDb();

        $s = new Registration();
        $registrations = $s->addRegistration($dbcon);

        if ($s) {
            header("Location: listRegistered.php");
        } else {
            echo "problem registering a team member";
        }
    }
}
?>

<html lang="en">
<head>
    <title>Registrations - Team Manager</title>
    <meta name="description" content="Team Registration System">
    <meta name="keywords" content="Team, Registration, Login, Admin">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
</head>
<body>
<div>
    <!--    Form to Add  Student -->
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" id="name" value=""
                   placeholder="Enter name">
            <span style="color:red;"><?= $nameerr; ?></span>
        </div>

        <div class="form-group">
            <label for="username">UserName :</label>
            <input type="text" class="form-control" name="username" id="username" value=""
                   placeholder="Enter a User Name">
            <span style="color:red;"><?= $unameerr; ?></span>
        </div>
        <div class="form-group">
            <label for="regpassword">Password :</label>
            <input type="password" class="form-control" name="regpassword" id="regpassword" value=""
                   placeholder="Enter a password">
            <input type="checkbox" onclick="showPass()">Show Password
            <div><span style="color:red;"><?= $passerr; ?></span></div>
            <script>
                function showPass() {
                    let x = document.getElementById("regpassword");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
                </script>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="" placeholder="Enter email">
            <span style="color:red;"><?= $emailerr; ?></span>
        </div>
        <div class="form-group">
            <label for="phone">Phone :</label>
            <input type="text" name="phone" value="" class="form-control"
                   id="phone" placeholder="Enter phone number">
            <span style="color:red;"><?= $phoneerr; ?></span>
        </div>

        <div class="form-group">
            <label for="isadmin">Are you an Administrator of the team?</label>
            <input type="hidden" name="isadmin" value="0" class="form-control">
            <input type="checkbox" name="isadmin" value="1" class="form-control">

        </div>
        <a href="listRegistered.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="register"
                class="btn btn-primary float-right" id="btn-submit">
            Register
        </button>
    </form>
</div>

</body>
</html>