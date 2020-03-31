<?php
namespace Classes;
use PDO;
class faq {
    public function showAllFaq($db){
        $sql = "SELECT * FROM faq";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $faqs = $pdostm->fetchALL(PDO::FETCH_OBJ);
        return $faqs;
    }
    public function getFaqById($id,  $db) {
        $sql = "SELECT * FROM faq WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

    public function addFaq($question, $answer, $db)
    {
        $sql = "INSERT INTO faq (question, answer) 
                VALUES (:question, :answer) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':question', $question);
        $pst->bindParam(':answer', $answer);

        $count = $pst->execute();
        return $count;
    }

    public function updateFaq($id, $question, $answer, $db) {
        $sql = "UPDATE faq SET question = :question, answer = :answer
               WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->bindParam(':question', $question);
        $pst->bindParam(':answer', $answer);

        $count = $pst->execute();
        return $count;
    }
    public function deleteFaq($id, $db) {
        $sql = "DELETE FROM faq WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
        }

}