<?php

namespace core;

use core\modules\AccessControl;
use core\modules\Authorization;
use core\users\Admin;
use core\users\Guest;


class App
{

    private static $instance;
    private function __construct(){}
    private function __wakeup(){}
    private function __clone(){}

    public static function Instance()
    {
        if(empty(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function run($url){
        AccessControl::setQuery($url);
        $user = Authorization::getRole();
        AccessControl::access($user);

    }

}