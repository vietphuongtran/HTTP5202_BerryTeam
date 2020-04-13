<?php
namespace Classes;
use PDO;
use PDOException;
class Database {
    private static $user = 'root';
<<<<<<< Updated upstream
    private static $password = 'root';
    private static $dbname = 'berryteam';
    private static $dsn = 'mysql:host=localhost;dbname=berryteam' ;
=======
    private static $password = 'root_pass';
    //private static $dbname = 'berryteam';
    private static $dsn = 'mysql:host=berry_db;dbname=berry_team' ;
>>>>>>> Stashed changes
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
