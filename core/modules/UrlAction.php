<?php


namespace core\modules;


abstract class UrlAction
{
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
            ViewGetter::render('Главная страница',true,'views/main/posts.php',$user);
        }
        if ($url == 'authorization') {
            ViewGetter::render('Авторизация',false,'views/sign/authorization.php',$user);
        }
        else if($url == 'profile')
        {
            ViewGetter::render('Профиль',true,'views/main/profile.php',$user);
        }
    }
}