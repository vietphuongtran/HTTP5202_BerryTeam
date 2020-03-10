<?php
 class Employee {
     public function showEmployees ($id, $db) {
         $sql = "select * from employees inner join employeesxtasks on 
                employees.id = employeesxtasks.employee_id where employeesxtasks.task_id = :id";
         $pst = $db->prepare($sql);

         $pst->bindParam(':id', $id);
         $count = $pst->execute();
         return $count;
     }
 }
