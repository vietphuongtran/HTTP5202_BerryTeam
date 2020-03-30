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
        $pdostm = $db->prepare($sql);
        $pdostm->execute();
        $toDoTasks = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $toDoTasks;

    }
    public function showDoingTasks($db) {

        $sql = "Select * from tasks where status= "."'Doing'";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();
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
        $pst = $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':status', $status);

        $count = $pst->execute();
        return $count;
    }
    public function getTaskById($id, $db){
        $sql = "SELECT * FROM tasks where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }
    public function updateTask($id, $name, $description, $status, $db)
    {
        $sql = "Update tasks set name = :name, 
            description = :description, status = :status
            WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':status', $status);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }
    public function deleteTask($id, $db)
    {
        $sql = "Delete from tasks
            WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);


        $count = $pst->execute();
        return $count;
    }
}
