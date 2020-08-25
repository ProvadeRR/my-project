<?php


namespace core\modules;


use core\others\Posts;

abstract class UrlAction
{
    private function __contruct(){

    }
    private function __clone(){

    }
    private function __wakeup(){

    }
    public static function UrlAction($url, $user){
        /*       * Обработка скриптов        */

        if ($url == 'logout') {
            session_destroy();
            header('Location: http://portfolio.ua');
        }

        if ($url == 'signin') {
            Authorization::getData(); // Получаем данные с формы
            Authorization::Auth(); // Авторизируем
            if (Authorization::getAuth()) {
                header('Location: http://portfolio.ua');
            } else {
                header('Location: http://portfolio.ua/authorization');
            }
        }

        /*            * Работа с шаблонами             */

        if (empty($url)) {
            $array = Posts::getPosts();
            ViewGetter::render('Главная страница',true,'views/main/posts.php',$user,$array);
        }
        if ($url == 'authorization') {
            ViewGetter::render('Авторизация',false,'views/sign/authorization.php',$user);
        }
    }
}