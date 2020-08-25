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
            if(!empty($comentaries))
            {
                Posts::setComentary($postID,$comentaries);
                header('Location: http://portfolio.ua/post/'.$postID);
            }
            else{
                $_SESSION['error'] = 'Комментарий не может быть пустым';
                header('Location: http://portfolio.ua/post/'.$postID);
            }



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
            $array = Posts::getAllPosts();
            ViewGetter::render('Главная страница',true,'views/main/posts.php',$user,$array);
        }
        if ($url == 'authorization') {
            ViewGetter::render('Авторизация',false,'views/sign/authorization.php',$user);
        }
        if(preg_match('/^post\/[0-9]+/' ,$url))
        {
            $getID = explode('/',$url);
            $post = Posts::getOnePost($getID[1]);
            $comentaries = Posts::getComentaries($getID[1]);
            if(!empty($post))
            {
                ViewGetter::render("{$post[0]['title']}",true,'views/posts/post.php',$user,$array = ['post' => $post , 'comentaries' => $comentaries]);
            }
            else{
                header('Location: http://portfolio.ua');
            }
        }
    }
}