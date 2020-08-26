<?php


namespace core\others;


use core\modules\Database;

class Posts extends Database
{
    public static function getAllPosts(){
        $result = Database::find("SELECT posts.date,posts.id, users.name,posts.title,posts.small_text,posts.avaibility,posts.date FROM `posts`INNER JOIN users ON posts.author_id = users.id ORDER BY posts.date DESC ");
        if(!$result)
        {
            $result = Database::find("SELECT * FROM `posts`");
        }
        return $result;
    }
    public static function getOnePost($id){

        $result = Database::find("SELECT posts.id, posts.id,posts.title_image , users.name,posts.title,posts.text,posts.avaibility,posts.date FROM `posts`INNER JOIN users ON posts.author_id = users.id WHERE posts.id = $id ");
        return $result;
    }
    public static function getComentaries($id){

        $result = Database::find("SELECT comentaries.id , users.name , users.surname , comentaries.text FROM `comentaries`INNER JOIN users ON comentaries.user_id = users.id WHERE comentaries.post_id = $id ORDER BY comentaries.id DESC");
        return $result;
    }
    public static function setComentary($postID,$comentary)
    {
        $userID = $_SESSION['id'];
        $result = Database::set ("INSERT INTO `comentaries`(`id`, `user_id`, `post_id`, `text`) VALUES (NULL,?,?,?)",[$_SESSION['id'],$postID,$comentary]);
        return $result;
    }
}