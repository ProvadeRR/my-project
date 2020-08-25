<?php


namespace core\others;


use core\modules\Database;

class Posts extends Database
{
    protected static $table = 'posts';

    public static function getPosts(){
        $result = Database::findAll(self::$table);
        return $result;
    }
}