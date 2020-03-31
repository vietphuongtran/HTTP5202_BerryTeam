<?php
namespace Classes;
use PDO;
class ColleaguesxTasks {
    public function showColleaguesWithTask($id, $db)
    {
        $sql = "select * from colleagues inner join colleaguesxtasks on 
                colleagues.id = colleaguesxtasks.colleague_id where colleaguesxtasks.task_id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->execute();
        $employeesWithTask = $pst->fetchAll(PDO::FETCH_OBJ);
        return $employeesWithTask;
    }
    public function assignColleague($tid, $eid, $db) {
        $sql = "insert into employeesxtasks (employee_id, task_id) values (:eid, :tid)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':tid', $tid);
        $pst->bindParam(':eid', $eid);

        $count = $pst->execute();
        return $count;
    }

}
