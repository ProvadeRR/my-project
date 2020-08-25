<?php


namespace core\modules;


abstract class AccessControl
{

    private static $url;

    private function __contruct(){

    }
    private function __clone(){

    }
    private function __wakeup(){

    }

    public static function setQuery($query)
    {
        self::$url = rtrim($query, '/');
    }

    public static function UserRigths($rights = ''){
        $accessRight = false;
        $access = include ROOT . '/settings/access.php';
        if($rights != 'ALL')
        {
            for ($i = 0 ; $i<= count($access[$rights]);$i++)
            {
                if(self::$url == $access[$rights][$i]){
                    return true;
                }
            }
        }
        else{
            if(preg_match($access['ALL'][0],self::$url) == true)
            {
                return true;
            }
            else{
                return false;
            }
        }


    }
    public static function getAccess($user){
        define('USER', get_class($user));
        $userRights = false;
        if(USER == CLASS_GUEST)
        {
            if(!$userRights = self::UserRigths('ALL'))
            {
                $userRights = self::UserRigths('GUEST');

            }
        }
        if(USER == CLASS_DEFAULT_USER)
        {
            if(!$userRights = self::UserRigths('ALL'))
            {
                $userRights = self::UserRigths('DEFAULT_USER');
            }
        }
        if(USER == CLASS_ADMIN)
        {
            if(!$userRights = self::UserRigths('ALL'))
            {
                $userRights = self::UserRigths('ADMIN');
            }
        }

        return $userRights;
    }
    public static function access($user)
    {
        if(self::getAccess($user)) {

            UrlAction::UrlAction(self::$url , $user);
        }
        else{
            header('Location: http://portfolio.ua');
        }
    }

}
