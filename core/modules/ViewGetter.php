<?php


namespace core\modules;


abstract class ViewGetter
{
    public static function render($title = '',$nav_bar = true,$contentpath = '',$user,$array = [])
    {
        $translator = require ROOT . '/vendor/libs/translator.php';
        ob_start();
        if($nav_bar == true)
        {
            self::Layout($title, false , $contentpath , $translator);
            $nav_bar = require ROOT . 'views/main/nav_bar.php';
            $content = require ROOT . "/{$contentpath}";

            $nav_bar = ob_get_contents();
            $content = ob_get_contents();
        }
        else{
            self::Layout($title, false , $contentpath , $translator);
            $content = require ROOT . "/{$contentpath}";
            $content = ob_get_contents();
        }
    }
    public static function Layout($title = 'portfolio.ua')
    {
        include ROOT . '/views/layouts/default.php';
    }
}