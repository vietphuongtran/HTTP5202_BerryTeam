<?php
namespace Classes;
use PDO;
class blog {
    public function showAllBlog($db){
        $sql = "SELECT * FROM blog";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $blogs = $pdostm->fetchALL(PDO::FETCH_OBJ);
        return $faqs;
    }
    public function getBlogById($id,  $db) {
        $sql = "SELECT * FROM faq WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

    public function addBlog($title, $content, $db)
    {
        $sql = "INSERT INTO blog (title, content) 
                VALUES (:title, :content) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':title', $title);
        $pst->bindParam(':content', $content);

        $count = $pst->execute();
        return $count;
    }

    public function updateBlog($id, $title, $content, $db) {
        $sql = "UPDATE blog SET title = :title, content = :content
               WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':content', $content);

        $count = $pst->execute();
        return $count;
    }
    public function deleteBlog($id, $db) {
        $sql = "DELETE FROM blog WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

}