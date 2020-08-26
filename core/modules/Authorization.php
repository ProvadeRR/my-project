<?php

namespace core\modules;

use core\users\Admin;
use core\users\DefaultUser;
use core\users\Guest;

class Authorization extends Database
{
    protected static $db;  // Переменная работает с базой данных

    protected static $login; // Переменная которая принимает логин с формы
    protected static $password; // Переменная которая принимает пароль с формы

    protected static $auth; // Переменная , которая определяет авторизирован ли пользователь

    protected static $role; // Переменная которая создает нужный нам класс



    private function __construct(){

    } // Отключаем возможность создания объекта этого класса
    private function __wakeup()
    {

    } // Отключаем возможность создания объекта этого класса
    private function __clone()
    {

    } // Отключаем возможность создания объекта этого класса

    public static function getAuth() // Проверяем - авторизован ли пользователь на сайте
    {
        if (empty($_SESSION['auth'])) {
            self::$auth = false;
        } else {
            self::$auth = true;
        }
        return self::$auth;
    }

    public static function getData(){ // Получаем данные с формы на этапе авторизации
        self::$login = $_POST['login'];
        self::$password = $_POST['password'];
    }

    public static function Auth(){ // Ищем в базе данных , по данным с формы
        $result = Database::crud('SELECT * FROM `users` WHERE login  = ? AND password = ?' , [self::$login,self::$password]);
        if($result != false)
        {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $result['id'];
        }
        else{
            $result = Database::crud('SELECT * FROM `users` WHERE login  = ?' , [self::$login]);
            if($result == false)
            {
                $_SESSION['error'] = 'Пользователь с таким логином не найден';
            }
            else{
                $_SESSION['error'] = 'Вы ввели неверный пароль';
            }
        }
        Database::Disconnect();
    }
    public static function getRole(){ // Получаем определенную роль на сайте
        if(!self::getAuth())
        {
            self::$role = new Guest('','','');
        }
        else{
            $result = Database::crud('SELECT * FROM `users` WHERE id  = ?' , [$_SESSION['id']]);
            if($result == false)
            {
                session_destroy();
            }
            if(!empty($result))
            {
                if($result['role_id'] == DEFAULT_USER)
                {
                    self::$role = new DefaultUser($result['name'],$result['surname'],$result['NativeLanguage'],$result['role_id']);
                }
                if($result['role_id'] == ADMIN)
                {
                    self::$role = new Admin($result['name'],$result['surname'],$result['NativeLanguage'],$result['role_id']);
                }
            }
        }
        return  self::$role;
    }


}
