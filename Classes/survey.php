<?php
namespace Classes;
use PDO;
class survey{
    public function showAllSurvey($db){
        $sql = "SELECT * FROM survey";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $surveys = $pdostm->fetchALL(PDO::FETCH_OBJ);
        return $surveys;
    }
    public function getSurveyById($id,  $db) {
        $sql = "SELECT * FROM survey WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

    public function addSurvey($question, $optionA, $optionB, $optionC, $db)
    {
        $sql = "INSERT INTO survey (id, question, optionA, optionB, optionC, ) 
                VALUES (:question, :optionA, :optionB, :optionC) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':question', $question);
        $pst->bindParam(':optionA', $optionA);
        $pst->bindParam(':optionB', $optionB);
        $pst->bindParam(':optionC', $optionC);

        $count = $pst->execute();
        return $count;
    }

    public function updateSurvey($id, $question, $optionA,  $optionB,  $optionC, $db) {
        $sql = "UPDATE survey SET question = :question, optionA = :optionA, optionB = :optionB, optionC = :optionC
               WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->bindParam(':question', $question);
        $pst->bindParam(':optionA', $optionA);
        $pst->bindParam(':optionB', $optionB);
        $pst->bindParam(':optionC', $optionC);

        $count = $pst->execute();
        return $count;
    }
    public function deleteSurvey($id, $db) {
        $sql = "DELETE FROM survey WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

}