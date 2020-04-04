<?php
namespace Classes;
use PDO;
use PDOException;
 class Database {
     private static $user = 'root';

     //remember to change the password:
     private static $password = 'root_pass';
     //remember to change the database:
     private static $dbname = 'phpclass';

     private static $dsn = 'mysql:host=mysql_berry;dbname=berry_team' ;
     private static $dbcon;

     private function __construct()
     {
     }

     //get pdo connection
     public static function getDb()
     {
         if (!isset(self::$dbcon)) {

             try {
                 self::$dbcon = new PDO(self::$dsn, self::$user, self::$password);
             } catch (PDOException $e) {
                 $msg = $e->getMessage();
                 echo "Problem connecting";
                 exit();
             }
         }
         return self::$dbcon;
     }

 }
