<?php
namespace Classes;
use PDO;
 class Employee {
     public function showEmployeesWithTask ($id, $db) {
         $sql = "select * from employees inner join employeesxtasks on 
                employees.id = employeesxtasks.employee_id where employeesxtasks.task_id = :id";
         $pst = $db->prepare($sql);

         $pst->bindParam(':id', $id);
         $pst->execute();
         $employeesWithTask = $pst->fetchAll(PDO::FETCH_OBJ);
         return $employeesWithTask;
     }
     public function selectAllEmployees ($db) {
         $sql = "select * from employees";
         $pdostm = $db->prepare($sql);
         $pdostm->execute();

         $employees = $pdostm->fetchAll(PDO::FETCH_OBJ);
         return $employees;
     }
     public function assignEmployee($tid, $eid, $db) {
         $sql = "insert into employeesxtasks (employee_id, task_id) values (:eid, :tid)";
         $pst = $db->prepare($sql);

         $pst->bindParam(':tid', $tid);
         $pst->bindParam(':eid', $eid);

         $count = $pst->execute();
         return $count;
     }
 }
