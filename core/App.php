<?php

namespace core;

use core\modules\Authorization;
use core\users\Admin;
use core\users\Guest;


class App
{
    private static $url;
    private static $instance;
    private function __construct(){

    }
    private function __wakeup()
    {

    }
    private function __clone()
    {

    }

    public static function Instance()
    {
        if(empty(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public static function getQuery($query){
        self::$url = rtrim($query,'/');
    }
    public static function routes($user){

        define('USER',get_class($user));

        $translator =  include ROOT . '/vendor/libs/translator.php';

        if(empty(self::$url))
        {
            self::Layout("{$translator['Главная страница'][$user->getLanguage()]}");
            $content = include ROOT . '/views/main/index.php';
        }
        else if(self::$url == 'authorization')
        {
            if(USER != CLASS_GUEST)
            {
                header('Location: http://portfolio.ua');

            }
            else{
                self::Layout("{$translator['Авторизация'][$user->getLanguage()]}");
                $content = include ROOT . '/views/sign/authorization.php';
            }
        }
        else if(self::$url == 'logout')
        {
            if(USER != CLASS_GUEST)
            {
                session_destroy();
                header('Location: http://portfolio.ua');
            }
            else{
               header('Location: http://portfolio.ua/authorization');
            }
        }
        else if(self::$url == 'signin')
        {
            if(USER != CLASS_GUEST)
            {
                header('Location: http://portfolio.ua');
            }
            else{
                Authorization::getData(); // Получаем данные с формы
                Authorization::Auth(); // Авторизируем
                if(Authorization::getAuth())
                {
                    header('Location: http://portfolio.ua');
                }
                else{
                    header('Location: http://portfolio.ua/authorization');
                }
            }
        }
        else{
            self::Layout("{$translator['Ошибка 404'][$user->getLanguage()]}");
            include ROOT .'/views/error/404.php';
        }

    }
    public static function Layout($title = 'portfolio.ua'){
        include ROOT . '/views/layouts/default.php';
    }
    public static function run($url){
        self::getQuery($url); // получаем URL
        $user = Authorization::getRole(); // Определяем пользовательскую роль
        self::routes($user); // передаем нашему маршрутизатору роль пользователя

    }

}