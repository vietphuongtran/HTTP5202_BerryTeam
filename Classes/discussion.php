<?php
namespace Classes;
use PDO;
    class Discussion {
        public function showAllDiscussions($db){

            $sql = "SELECT * FROM discussions";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();

            $discussions = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $discussions;
        }
        public function getDiscussionById($db, $id) {
            $sql = "Select * from discussions where id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $pst->execute();
            return $pst->fetch(PDO::FETCH_OBJ);
        }
        public function updateDiscussion($id, $content, $topic, $db)
        {
            $sql = "Update discussions set content = :content, 
            topic = :topic
            WHERE id = :id";
            $pst = $db->prepare($sql);

            $pst->bindParam(':content', $content);
            $pst->bindParam(':topic', $topic);
            $pst->bindParam(':id', $id);

            $count = $pst->execute();
            return $count;
        }
    }
    ?>
