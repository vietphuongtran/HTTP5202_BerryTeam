<?php
require_once "Classes/database.php";
require_once 'Classes/registration.php';
use Classes\Database;
use Classes\Registration;
$name = $username = "";

if(isset($_POST['updateRegistrations'])){
    $id= $_POST['id'];
    $user = 'root';
    $password = 'root';
    $dbname = 'phpclass';
    $dsn = 'mysql:host=localhost;dbname=' . $dbname;

    $dbcon = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM registrations where registrationId = :id";
    $pst = $dbcon->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    $registration = $pst->fetch(PDO::FETCH_OBJ);

    $name =  $registration->registeredName;
    $username =  $registration->registeredLogin;
    $regpassword =  $registration->registeredPassword;
    $email = $registration->registeredEmail;
    $phone = $registration->registeredPhoneNum;
    $isadmin =  $registration->isAdmin;



}
if(isset($_POST['updRegistration'])) {
//    $name = $_POST['name'];
//    $username = $_POST['username'];
//    $regpassword = $_POST['regpassword'];
//    $email = $_POST['email'];
//    $phone = $_POST['phone'];
//    $isadmin = $_POST['isadmin'];
//    $id = $_POST['rid'];
//
//    $user = 'root';
//    $password = 'root';
//    $dbname = 'phpclass';
//    $dsn = 'mysql:host=localhost;dbname=' . $dbname;
//
//    $dbcon = new PDO($dsn, $user, $password);
//
//    $sql = "Update registrations
//                set registeredName = :name,
//                registeredLogin = :username,
//                registeredPassword = :regpassword,
//                registeredEmail = :email,
//                registeredPhoneNum = :phone,
//                isAdmin = :isadmin
//                WHERE registrationId = :id;
//
//        ";
//
//    $pst =   $dbcon->prepare($sql);
//
//    $pst->bindParam(':name', $name);
//    $pst->bindParam(':username', $username);
//    $pst->bindParam(':regpassword', $regpassword);
//    $pst->bindParam(':email', $email);
//    $pst->bindParam(':phone', $phone);
//    $pst->bindParam(':isadmin', $isadmin);
//    $pst->bindParam(':id', $id);

    $dbcon = Database::getDb();

    $s = new Registration();
    $registrations = $s->updateRegistration($dbcon);

    if($s){
        header("Location: listRegistered.php");
    } else {
        echo "problem registering a team member";
    }
}

?>

<html lang="en">

<head>
    <title>Add User - Team Registration System</title>
    <meta name="description" content="Team Registration System">
    <meta name="keywords" content="Team, Registration, Login, Admin">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
</head>

<body>

<div>
    <!--     -->
    <form action="" method="post">
        <input type="hidden" name="rid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>"
                   placeholder="Enter name">
            <span style="color: red">

            </span>
        </div>

        <div class="form-group">
            <label for="username">UserName :</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= $username; ?>"
                   placeholder="Enter a User Name">
            <span style="color: red">

            </span>
        </div>

        <div class="form-group">
            <label for="password">Password :</label>
            <input type="text" class="form-control" name="regpassword" id="regpassword" value="<?= $regpassword; ?>"
                   placeholder="Enter a password">
            <span style="color: red">

            </span>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="<?= $email; ?>" placeholder="Enter email">
            <span style="color: red">

            </span>
        </div>

        <div class="form-group">
            <label for="phone">Phone :</label>
            <input type="text" name="phone" value="<?= $phone; ?>" class="form-control"
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
        <button type="submit" name="updRegistration"
                class="btn btn-primary float-right" id="btn-submit">
            Update Registration
        </button>
    </form>
</div>


</body>
</html