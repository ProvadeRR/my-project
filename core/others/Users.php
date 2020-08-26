<?php


namespace core\others;


use core\modules\Database;

class Users extends Database
{
    public static function getAllUsers(){
        $result = Database::get("SELECT * FROM `users` ORDER BY users.date_registation DESC");
        return $result;
    }
    public static  function deleteUser($id){
        $result = Database::set('DELETE FROM `users` WHERE id = ? AND role_id < 2 ', [$id]);
        if(Database::crud('SELECT * FROM users WHERE id = ?',[$id])){
            return false;
        }
        else{
            return true;
        }
    }
}