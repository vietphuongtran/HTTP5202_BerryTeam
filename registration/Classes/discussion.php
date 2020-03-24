<?php
    class Discussion {
        public function showAllDiscussions($dbcon){


            $sql = "SELECT * FROM discussions";
            $pdostm = $dbcon->prepare($sql);
            $pdostm->execute();

            $discussions = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $discussions;
        }
    }
    ?>
