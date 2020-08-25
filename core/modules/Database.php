<?php


namespace core\modules;
use PDO;

class Database
{
    protected static  $db;

    private function __construct(){

    }
    private function __wakeup()
    {

    }
    private function __clone()
    {

    }

    public static function Connect(){
        try {
            $config_db = require ROOT . '/settings/config_db.php';
            self::$db = new PDO("mysql:host={$config_db['dbhost']};dbname={$config_db['dbname']};",$config_db['user'] , $config_db['password']);
           self::$db->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        }catch (\PDOException $e)
        {
            $e->getMessage();
        }
    }
    public static function Disconnect(){
        self::$db = null;
    }
    public static function crud($sql,$params = [])
    {
        self::Connect();
       $stmt = self::$db->prepare($sql);
       $stmt->execute($params);
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
       self::Disconnect();
       return $result;
    }
    public static function findAll($table = ''){
        self::Connect();
        $stmt = self::$db->query("SELECT posts.id, users.name,posts.title,posts.small_text,posts.avaibility,posts.date FROM {$table} INNER JOIN users ON posts.author_id = users.id");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        self::Disconnect();
        return $result;
    }

}