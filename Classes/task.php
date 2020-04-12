<?php
namespace Classes;
use PDO;
class Task {
    public function showAllTasks($db){
        $sql = "SELECT * FROM tasks";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();

        $tasks = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $tasks;
    }

    public function showToDoTasks($db) {

        $sql = "Select * from tasks where status= "."'To Do'";
        //prepare the sql
        $pdostm = $db->prepare($sql);
        //execute
        $pdostm->execute();
        //fetch all the data
        $toDoTasks = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $toDoTasks;

    }
    public function showDoingTasks($db) {

        $sql = "Select * from tasks where status= "."'Doing'";
        //prepare sql
        $pdostm = $db->prepare($sql);
        //execute
        $pdostm->execute();
        //fetch all the data to loop through
        $doingTasks = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $doingTasks;

    }
    public function showDoneTasks($db) {

        $sql = "Select * from tasks where status= "."'Done'";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();
        $doneTasks = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $doneTasks;
    }
    public function addTasks($name, $description, $status, $db)
    {
        $sql = "INSERT INTO tasks (name, description, status) 
              VALUES (:name, :description, :status) ";
        //prepare sql
        $pst = $db->prepare($sql);
        //bind parameter
        $pst->bindParam(':name', $name);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':status', $status);
        //execute
        $count = $pst->execute();
        return $count;
    }
    public function getTaskById($id, $db){
        $sql = "SELECT * FROM tasks where id = :id";
        //prepare sql
        $pst = $db->prepare($sql);
        //bind param
        $pst->bindParam(':id', $id);
        //execute
        $pst->execute();
        //gather result
        return $pst->fetch(PDO::FETCH_OBJ);
    }
    public function updateTask($id, $name, $description, $status, $db)
    {
        $sql = "Update tasks set name = :name, 
            description = :description, status = :status
            WHERE id = :id";
        //prepare sql
        $pst = $db->prepare($sql);
        //bindparam
        $pst->bindParam(':name', $name);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':status', $status);
        $pst->bindParam(':id', $id);
        //execute
        $count = $pst->execute();
        return $count;
    }
    public function deleteTask($id, $db)
    {
        $sql = "Delete from tasks WHERE id = :id";
        //prepare
        $pst = $db->prepare($sql);
        //bindparam
        $pst->bindParam(':id', $id);
        //execute.
        $count = $pst->execute();
        return $count;
    }
    public function searchTask ($searchWord, $db) {
        $sql = "SELECT * FROM tasks
        WHERE name LIKE  :searchWord
        OR status LIKE :searchWord
        OR description LIKE :searchWord";
        $searchWord = "%$searchWord%";
        $pdostm = $db->prepare($sql);
        //PHP does not like the % sign
        //need to get around that by declaring new variable
        //Reference: https://thisinterestsme.com/wildcard-pdo-prepared-statement/
        $pdostm->bindParam(':searchWord', $searchWord);
        //execute
        $pdostm->execute();
        //fetch all the data to loop through
        $searchTasks = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $searchTasks;
    }
}
