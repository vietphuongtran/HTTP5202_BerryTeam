<?php
namespace Classes;
use PDO;
use PDOException;
class Database {
    private static $user = 'root';

    //remember to change the password:
    private static $password = 'passwordroot';
    //remember to change the database:
    //private static $dbname = 'berryteam';

    private static $dsn = 'mysql:host=localhost;dbname=berry team';
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
                echo "Problem connecting quotes database";
                exit();
            }
        }
        return self::$dbcon;
    }

}

