<?php


namespace core\modules;


abstract class AccessControl
{
    private static $url;

    public static function setQuery($query)
    {
        self::$url = rtrim($query, '/');
    }

    public static function Layout($title = 'portfolio.ua')
    {
        include ROOT . '/views/layouts/default.php';
    }

    public static function getAccess($user){
        define('USER', get_class($user));
        $access = include ROOT . '/settings/access.php';
        $accessRight = false;
        if(USER == CLASS_GUEST)
        {
           for ($i = 0 ; $i<= count($access['GUEST']);$i++)
            {
                if(self::$url == $access["GUEST"][$i]){
                    $accessRight = true;
                }
            }
        }
        if(USER == CLASS_DEFAULT_USER)
        {
            for ($i = 0 ; $i<= count($access['DEFAULT_USER']);$i++)
            {
                if(self::$url == $access["DEFAULT_USER"][$i]){
                    $accessRight = true;
                }
            }
        }
        if(USER == CLASS_ADMIN)
        {
            for ($i = 0 ; $i<= count($access['ADMIN']);$i++)
            {
                if(self::$url == $access["ADMIN"][$i]){
                    $accessRight = true;
                }
            }
        }
        return $accessRight;
    }


    public static function access($user)
    {
        if(self::getAccess($user)) {
            $translator = include ROOT . '/vendor/libs/translator.php';

            if (empty(self::$url)) {
                self::Layout('Главная страница');
                $nav_bar = include ROOT . 'views/main/nav_bar.php';

            }

             else if (self::$url == 'authorization') {
                self::Layout("{$translator['Авторизация'][$user->getLanguage()]}");
                $content  = include ROOT . 'views/sign/authorization.php';
            } else if (self::$url == 'logout') {
                session_destroy();
                header('Location: http://portfolio.ua');
            } else if (self::$url == 'signin') {
                Authorization::getData(); // Получаем данные с формы
                Authorization::Auth(); // Авторизируем
                if (Authorization::getAuth()) {
                    header('Location: http://portfolio.ua');
                } else {
                    header('Location: http://portfolio.ua/authorization');
                }
            }
            else if(self::$url == 'profile')
            {
                self::Layout("{$translator['Профиль'][$user->getLanguage()]}");
                $nav_bar = include ROOT . 'views/main/nav_bar.php';
                $content = include ROOT . 'views/main/profile.php';
            }

        }
        else{
            header('Location: http://portfolio.ua');
        }
    }

}
