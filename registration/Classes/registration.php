<?php
namespace Classes;
use PDO;

class Registration {

    public function listRegistered($dbcon){
        $sql = "SELECT * FROM registrations";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $registrations = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $registrations;
    }

    public function addRegistration($dbcon){

        $name = $_POST['name'];
        $username = $_POST['username'];
        $regpassword = $_POST['regpassword'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $isadmin = $_POST['isadmin'];

        $sql = "INSERT INTO registrations (registeredName, registeredLogin, registeredPassword, registeredEmail, registeredPhoneNum, isAdmin) 
              VALUES (:name, :username, :regpassword, :email, :phone, :isadmin) ";
        $pst = $dbcon->prepare($sql);


        $pst->bindParam(':name', $name);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':regpassword', $regpassword);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':isadmin', $isadmin);

        $count = $pst->execute();
        return $count;
    }

    public function updateRegistration($dbcon){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $regpassword = $_POST['regpassword'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $isadmin = $_POST['isadmin'];
        $id = $_POST['rid'];

        $sql = "Update registrations
                set registeredName = :name,
                registeredLogin = :username,
                registeredPassword = :regpassword,
                registeredEmail = :email,
                registeredPhoneNum = :phone,
                isAdmin = :isadmin
                WHERE registrationId = :id;
        
        ";

        $pst =   $dbcon->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':regpassword', $regpassword);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':isadmin', $isadmin);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;

    }
    public function deleteRegistration($dbcon){
        $id = $_POST['id'];
        $sql = "DELETE FROM registrations WHERE registrationId = :id";

        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }
}