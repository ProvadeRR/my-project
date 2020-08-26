<?php


namespace core\modules;


use core\others\Posts;
use core\others\Users;

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
        if ($url == 'admin-panel/create-new-post') {
            if(empty($_POST['text']) && empty($_POST['title']))
            {
                $_SESSION['create-post'] = 'Не удалось создать пост';
            }
            else{
                $name =  $_FILES['title_image']['name'];
                move_uploaded_file($_FILES['title_image']['tmp_name'], '../public/uploads/'.$name);
                $image = 'uploads/' . $name ;
                Posts::setPost($_POST['title'],$image,$_POST['small_text'],$_POST['text']);
                $_SESSION['create-post'] = 'Вы успешно создали пост';
            }
            echo "<script>history.go(-2)</script>";
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
        if(preg_match('/delete\/[0-9]+/' ,$url))
        {

            $getID = explode('/',$url);
            if(isset($_GET['access']) == 'true')
            {
                foreach ($getID as $k => $v)
                {
                    if(preg_match('/[0-9]+/' , $v))
                    {
                        $id = $v;
                    }
                }
                if($_GET['delete'] == 'users')
                {
                    $result = Users::deleteUser($id);
                    if($result == false)
                    {
                        $_SESSION['error'] = 'Вы не можете удалить администратора или не существующего пользователя';
                    }
                    else{
                        $_SESSION['error'] = "Пользователь успешно был удален!";
                    }
                    header('Location: http://portfolio.ua/admin-panel/users');
                }
                else if($_GET['delete'] == 'posts')
                {
                    $result = Posts::deletePost($id);
                    if($result == false)
                    {
                        $_SESSION['error'] = 'Вы не можете удалить этот пост';
                    }
                    else{
                        $_SESSION['error'] = "Пост был успешно удален!";
                    }
                    header('Location: http://portfolio.ua/admin-panel/posts');
                }
            }


        }
        if ($url == 'signin') {
            Authorization::getData(); // Получаем данные с формы
            Authorization::Auth(); // Авторизируем
            if (Authorization::getAuth()) {
                header('Location: http://portfolio.ua/');
            } else {
                header('Location: http://portfolio.ua/authorization');
            }
        }

        /*            * Работа с видами             */

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
        if ($url == 'admin-panel/posts') {
            $posts = Posts::AdminGetAllPosts('SELECT * FROM posts WHERE author_id = ?',[$_SESSION['id']]);
            self::$data['posts'] = $posts;
            ViewGetter::render('Список постов','admin',false,'views/admin/posts.php',self::$data);
        }
        if ($url == 'admin-panel/users') {
            $users = Users::getAllUsers();
            self::$data['users'] = $users;
            ViewGetter::render('Пользователи сайта','admin',false,'views/admin/users.php',self::$data);
        }
        if ($url == 'admin-panel/create-post') {
            ViewGetter::render('Создать пост','admin',false,'views/admin/create-post.php',self::$data);
        }
        if(preg_match('/[post]\/[0-9]+/' ,$url))
        {
            $getID = explode('/',$url);
            $post = Posts::getOnePost($getID[1]);
            $comentaries = Posts::getComentaries($getID[1]);
            self::$data['post'] = $post;
            self::$data['comentaries'] = $comentaries;
            if(!empty($post))
            {
                ViewGetter::render(self::$data['post'][0]['title'],'',true,'views/posts/post.php',self::$data);
            }
            else{
                header('Location: http://portfolio.ua');
            }
        }

    }
}