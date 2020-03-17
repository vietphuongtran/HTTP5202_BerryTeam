<?php
 class Database {
     private static $user = 'root';
     private static $password = 'root';
     private static $dbname = 'berryteam';
     private static $dsn = 'mysql:host=localhost;dbname=berryteam' ;
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
