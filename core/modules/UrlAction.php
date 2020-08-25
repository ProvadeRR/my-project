<?php


namespace core\modules;


use core\others\Posts;

abstract class UrlAction
{
    private static $data = [];
    private function __contruct(){

    }
    private function __clone(){

    }
    private function __wakeup(){

    }
    public static function UrlAction($url, $user){

        self::$data['object'] = $user;

        /*       * Обработка скриптов        */

        if ($url == 'logout') {
            session_destroy();
            header('Location: http://portfolio.ua');
        }
        if($url == 'addComentary')
        {
            $comentaries = $_POST['comentary'];
            foreach($_POST as $key => $value)
            {
                if(is_int($key))
                {
                    $postID = $key;
                }
            }
            Posts::setComentary($postID,$comentaries);
            echo "<script>history.go(-1)</script>";
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
            $posts = Posts::getAllPosts();
            self::$data['posts']= $posts;
            ViewGetter::render('Главная страница', '' , true,'views/main/posts.php',self::$data);
        }
        if ($url == 'authorization') {
            ViewGetter::render('Авторизация','',false,'views/sign/authorization.php',self::$data);
        }
        if ($url == 'admin-panel') {
            ViewGetter::render('Административная панель','admin',false,'views/admin/panel.php',self::$data);
        }
        if(preg_match('/^post\/[0-9]+/' ,$url))
        {
            $getID = explode('/',$url);
            $post = Posts::getOnePost($getID[1]);
            $comentaries = Posts::getComentaries($getID[1]);
            self::$data['post'] = $post;
            self::$data['comentaries'] = $comentaries;
            if(!empty($post))
            {
                ViewGetter::render(self::$data['post']['title'],'',true,'views/posts/post.php',self::$data);
            }
            else{
                header('Location: http://portfolio.ua');
            }
        }
    }
}