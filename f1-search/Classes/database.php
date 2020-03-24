<?php
namespace Classes;
use PDO;
use PDOException;

class Database
{
    private static $user = 'root';
    private static $password = 'passwordroot';
    private static $dbname = 'phpclass';
    private static $dsn = 'mysql:host=localhost;dbname=phpclass';
    private static $dbcon;

    public function __construct()
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
                include "searcherror.php";
                exit();
            }
        }
        return self::$dbcon;
    }
}