<?php
require_once '../Classes/database.php';
require_once '../Classes/employee.php';
use Classes\Database as dbConnect;
use Classes\Employee as allEmployeeFunction;

$db = dbConnect::getDb();
$e = new allEmployeeFunction();
$assignEmployees = $e->assignEmployee($db, tid, eid);
//turn employee to Json object
$jsonEmployees = json_encode($allEmployees);
header('Content-Type: application/json');
echo $jsonEmployees;
