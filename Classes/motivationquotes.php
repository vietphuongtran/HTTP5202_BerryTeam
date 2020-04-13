<?php
namespace Classes;
use PDO;

class Motivationquote {

    public function displayMotiQuote($dbcon) {
        $sql = "SELECT quotes FROM quotes
        ORDER BY RAND() LIMIT 1";
        $pdobtm = $dbcon->prepare($sql);
        $pdobtm->execute();
        $result = $pdobtm->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function listQuotes($dbcon) {
        $sql = "SELECT * FROM quotes";
        $pdobtm = $dbcon->prepare($sql); //btm: berryteam system
        $pdobtm->execute();
        $motivationquotes = $pdobtm->fetchAll(PDO::FETCH_ASSOC);
        return $motivationquotes;
    }

    public function addMotiQuotes($dbcon, $quotes, $category) {
        $sql = "INSERT INTO quotes (quotes, category)
                VALUES (:quotes, :category)";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':quotes', $quotes);
        $pst->bindParam(':category', $category);

        $count = $pst->execute();
        return $count;
    }

    public function getMotiQuoteById($id, $dbcon) {
        $sql = "SELECT * FROM quotes WHERE id = :id";
        $pst = $dbcon->prepare($sql);
        $pst -> bindParam(':id', $id);
        $pst -> execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

    public function updateMotiQuote($dbcon, $quotes, $category, $id) {
        $sql = "UPDATE quotes
                SET quotes = :quotes,
                category = :category
                WHERE id = :id";

        $pst = $dbcon->prepare($sql);

        $pst->bindParam(':quotes', $quotes);
        $pst->bindParam(':category', $category);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

    public function deleteMotiQuote($db, $id) {
        $sql = "DELETE FROM quotes WHERE `ID` = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
}