<?php


namespace core\modules;


abstract class ViewGetter
{
    private function __contruct(){

    }
    private function __clone(){

    }
    private function __wakeup(){

    }
    public static function render ($title = '',$layout = '',$nav_bar = true,$contentpath = '',$data = [])
    {
        if(empty($layout)) { $layout = 'default'; }
        $translator = require ROOT . '/vendor/libs/translator.php';
        ob_start();
        if($nav_bar == true)
        {
            self::Layout($title,$layout);
            $nav_bar = require ROOT . 'views/main/nav_bar.php';
            $content = require ROOT . "/{$contentpath}";
            $nav_bar = ob_get_contents();
            $content = ob_get_contents();
        }
        else{
            self::Layout($title,$layout);
            $content = require ROOT . "/{$contentpath}";
            $content = ob_get_contents();
        }
    }
    public static function Layout($title = 'portfolio.ua',$layout)
    {

        include ROOT . "/views/layouts/{$layout}.php";
    }
}