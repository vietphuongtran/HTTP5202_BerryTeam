<?php
require_once 'Classes/databaseserver.php';
require_once 'Classes/registration.php';

use Classes\Database;
use Classes\Registration;

//This is the page to show registered users to the site.
$dbcon = Database::getDb();

$s = new Registration();
$registrations = $s->listRegistered($dbcon);
//$user = 'root';
//$password = 'root';
//$dbname = 'phpclass';
//$dsn = 'mysql:host=localhost;dbname=' . $dbname;
//
//$dbcon = new PDO($dsn, $user, $password);


//$sql = 'SELECT * FROM registrations';
//$pdostm = $dbcon->prepare($sql);
//
//$pdostm->execute();
//
//$registrations = $pdostm->fetchAll(PDO::FETCH_OBJ);



?>

<html lang="en">
<head>
    <title>Registered Users</title>
    <meta name="description" content="Team Registration System">
    <meta name="keywords" content="Team, Registration, Login, Admin">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="/Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<p class="h1 text-center">Team Registration System</p>
<div class="m-1">
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Is Administrator</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($registrations as $registered) {
            ?>
            <tr>
                <th><?= $registered->registrationId; ?></th>
                <td><?= $registered->registeredName; ?></td>
                <td><?= $registered->registeredLogin; ?></td>
                <td><?= $registered->registeredEmail; ?></td>
                <td><?= $registered->registeredPhoneNum; ?></td>
                <td><?php
                    if ($registered->isAdmin == 1){
                        echo 'Is an Administrator';
                    }else{
                        echo 'Is not an Administrator';
                    }?></td>
                <td>
                    <form action="updateRegistrations.php" method="post">
                        <input type="hidden" name="id" value="<?= $registered->registrationId ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateRegistrations" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteRegistration.php" method="post">
                        <input type="hidden" name="id" value="<?= $registered->registrationId ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteRegistration" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php  } ?>

        </tbody>
    </table>
    <a href="addRegistration.php" id="btn_addRegistration" class="btn btn-success btn-lg float-right">Register</a>
</div>
<? include '../includes/footer-landing.php' ?>
</body>
</html>