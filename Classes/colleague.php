<?php
namespace Classes;
use PDO;

class Colleague {
    public function listColleague($dbcon) {
        $sql = "SELECT * FROM colleagues";
        $pdobtm = $dbcon->prepare($sql); //btm: berryteam system
        $pdobtm->execute();

        $colleagues = $pdobtm->fetchAll(PDO::FETCH_ASSOC);
        return $colleagues;
    }

    public function addColleague($dbcon, $fname, $lname, $department, $phone, $email) {
        $sql = "INSERT INTO colleagues (fname, lname, department, phone, email) 
              VALUES (:fname, :lname, :department, :phone, :email)";
        $pst = $dbcon->prepare($sql);

        $pst->bindParam(':fname', $fname);
        $pst->bindParam(':lname', $lname);
        $pst->bindParam(':department', $department);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':email', $email);

        $count = $pst->execute();
        return $count;
        //return $pst->fetchAll(PDO::FETCH_OBJ);
    }

    public function getColleagueById($id, $dbcon) {
        $sql = "SELECT * FROM colleagues WHERE id = :id";
        $pst = $dbcon->prepare($sql);
        $pst -> bindParam(':id', $id);
        $pst -> execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

    public function updateColleague($dbcon, $fname, $lname, $department, $phone, $email, $id) {
        $sql = "Update colleagues
                set fname = :fname,
                lname = :lname,
                department = :department,
                phone = :phone,
                Email = :email
                WHERE id = :id
                
        ";

        $pst =   $dbcon->prepare($sql);

        $pst->bindParam(':fname', $fname);
        $pst->bindParam(':lname', $lname);
        $pst->bindParam(':department', $department);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

    public function deleteColleague($db, $id) {
        $sql = "DELETE FROM berryteam WHERE `ID` = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }







}