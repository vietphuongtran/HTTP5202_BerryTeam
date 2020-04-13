<?php
require_once "Classes/databaseserver.php";
require_once 'Classes/registration.php';
use Classes\Database;
use Classes\Registration;

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $dbcon = Database::getDb();

    $s = new Registration();
    $registrations = $s->deleteRegistration($dbcon);

    if($s){
        header("Location: listRegistered.php");
    }
    else {
        echo " problem deleting";
    }
    //var_dump($id);

    //include 'connect.php';

//    $user = 'root';
//    $password = 'root';
//    $dbname = 'phpclass';
//    $dsn = 'mysql:host=localhost;dbname=' . $dbname;
//
//    $dbcon = new PDO($dsn, $user, $password);


//    $sql = "DELETE FROM registrations WHERE registrationId = :id";
//
//    $pst = $dbcon->prepare($sql);
//    $pst->bindParam(':id', $id);
//    $count = $pst->execute();
//    if($count){
//        header("Location: listRegistered.php");
//    }
//    else {
//        echo " problem deleting";
//    }


}