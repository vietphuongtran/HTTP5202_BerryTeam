<!DOCTYPE html>
<?php
require_once 'Classes/database.php';
require_once 'Classes/registration.php';
use Classes\Database;
use Classes\Registration;

if(isset($_POST['register'])) {

    $dbcon = Database::getDb();

    $s = new Registration();
    $registrations = $s->addRegistration($dbcon);

    if($s){
        header("Location: listRegistered.php");
    } else {
        echo "problem registering a team member";
    }
//    $name = $_POST['name'];
//    $username = $_POST['username'];
//    $regpassword = $_POST['regpassword'];
//    $email = $_POST['email'];
//    $phone = $_POST['phone'];
//    $isadmin = $_POST['isadmin'];
//
//    $user = 'root';
//    $password = 'root';
//    $dbname = 'phpclass';
//    $dsn = 'mysql:host=localhost;dbname=' . $dbname;
//
//    $dbcon = new PDO($dsn, $user, $password);

//    $sql = "INSERT INTO registrations (registeredName, registeredLogin, registeredPassword, registeredEmail, registeredPhoneNum, isAdmin)
//              VALUES (:name, :username, :regpassword, :email, :phone, :isadmin) ";
//    $pst = $dbcon->prepare($sql);
//
//    $pst->bindParam(':name', $name);
//    $pst->bindParam(':username', $username);
//    $pst->bindParam(':regpassword', $regpassword);
//    $pst->bindParam(':email', $email);
//    $pst->bindParam(':phone', $phone);
//    $pst->bindParam(':isadmin', $isadmin);
//
//    $count = $pst->execute();
//    if($count){
//        header("Location: listRegistered.php");
//    } else {
//        echo "problem registering a team member";
//    }
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
            <span style="color: red">

            </span>
        </div>

        <div class="form-group">
            <label for="username">UserName :</label>
            <input type="text" class="form-control" name="username" id="username" value=""
                   placeholder="Enter a User Name">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="password">Password :</label>
            <input type="text" class="form-control" name="regpassword" id="regpassword" value=""
                   placeholder="Enter a password">
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
        <div class="form-group">
            <label for="phone">Phone :</label>
            <input type="text" name="phone" value="" class="form-control"
                   id="phone" placeholder="Enter phone number">
            <span style="color: red">

            </span>
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