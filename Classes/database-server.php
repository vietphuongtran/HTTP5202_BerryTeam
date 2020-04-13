<?php
namespace Classes;
use PDO;
use PDOException;

class Database {
    //server sql connection:
    private static $user = 'root';
    private static $password = 'root_pass';
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
                echo $msg;
                echo "Problem connecting to server database...";
                exit();
            }
        }
        return self::$dbcon;
    }
}
