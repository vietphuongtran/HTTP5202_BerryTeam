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
        public function addDiscussion($content, $topic, $db)
        {
            $sql = "INSERT INTO discussions (content, topic) 
              VALUES (:content, :topic) ";
            $pst = $db->prepare($sql);

            $pst->bindParam(':content', $content);
            $pst->bindParam(':topic', $topic);

            $count = $pst->execute();
            return $count;
        }
        public function deleteDiscussion($id, $db)
        {
            $sql = "Delete from discussions WHERE id = :id";
            $pst = $db->prepare($sql);

            $pst->bindParam(':id', $id);

            $count = $pst->execute();
            return $count;
        }
        public function ddlPopulate ($db) {
            $sql = "Select id, topic from discussions";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            //fetching id and topic as associative array
            //Source: https://phpdelusions.net/pdo/fetch_modes#FETCH_BOTH
            $discussions = $pdostm->fetchAll(PDO::FETCH_KEY_PAIR);
            return $discussions;

        }
        public function searchDiscussion ($searchWord, $db) {
            $sql = "SELECT * FROM discussions
        WHERE topic LIKE  :searchWord
        OR content LIKE :searchWord";
            $searchWord = "%$searchWord%";
            $pdostm = $db->prepare($sql);
            //PHP does not like the % sign
            //need to get around that by declaring new variable
            //Reference: https://thisinterestsme.com/wildcard-pdo-prepared-statement/
            $pdostm->bindParam(':searchWord', $searchWord);
            //execute
            $pdostm->execute();
            //fetch all the data to loop through
            $searchDiscussions = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $searchDiscussions;
        }
    }
    ?>
