<?php
namespace Classes;
use PDO;
use PDOException;

class Database {
    //server sql connection:
    private static $user = 'root';
    private static $password = 'root_pass';
    private static $dsn = 'mysql:host=berry;dbname=berry_team';
    //private static $dsn = 'mysql:host=mysql_berry;dbname=berry_team';
    private static $dbcon;

    //add driver
    //public static PDO::getAvailableDrivers();

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
                //header("Location: /error404.php");
                $msg = $e->getMessage();
                echo "Problem connecting to server database... " . $msg;
                exit();
            }
        }
        return self::$dbcon;
    }
}
