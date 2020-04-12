<?php
namespace Classes;
use PDO;

class Comment {
    public function getCommentByDiscussionId($id, $db) {
        //because there was 2 ids columns from 2 tables using alias could help identify which is which
        $sql = "Select *, comments.id as 'commentID' from comments 
                left join discussions on 
                comments.discussion_id = discussions.id 
                where discussion_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetchAll(PDO::FETCH_OBJ);
    }
    public function getCommentById($id, $db) {
        $sql = "Select * from comments
                where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetchAll(PDO::FETCH_OBJ);
    }
    public function addComment($comment, $db, $discussion_id) {
        $sql = "Insert into comments (comment, discussion_id) values (:comment, :discussion_id)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':comment', $comment);
        $pst->bindParam(':discussion_id', $discussion_id);
        $count = $pst->execute();
        return $count;
    }
    public function editComment($comment, $db, $discussion_id, $id) {
        $sql = "Update comments set comments = :comment, discussion_id= :discussionid where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':comment', $comment);
        $pst->bindParam(':discussion_id', $discussion_id);
        $pst->bindParam(':id', $id);
        return $pst->execute();
    }

    public function commentCount($db) {
        $sql = "Select count(id) from comments group by discussion_id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':discussion_id');
        return $pst->execute();
        return $pst->fetchColumn(PDO::FETCH_OBJ);
    }
    //because there are 2 ids from discussions and comments table doing that give me just an id of comment to loop through
    public function getCommentToDelete ($id, $db) {
            $sql = "Select comments.id from comments 
                left join discussions on 
                comments.discussion_id = discussions.id 
                where discussion_id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $pst->execute();
            return $pst->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteComment($db, $id) {
        $sql = "Delete from comments where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        return $pst->execute();
    }
}
