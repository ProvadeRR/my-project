<?php


namespace core\others;


use core\modules\Database;

class Posts extends Database
{
    public static function AdminGetAllPosts(){
        $result = Database::getAll('SELECT * FROM posts WHERE author_id = ? ORDER BY id DESC ',[$_SESSION['id']]);
        return $result;
    }
    public static function getAllPosts(){
        $result = Database::get("SELECT posts.date,posts.id, users.name,posts.title,posts.small_text,posts.avaibility FROM `posts`INNER JOIN users ON posts.author_id = users.id ORDER BY posts.id DESC");
        return $result;
    }
    public static function setPost($title,$imagescr,$small_text,$text)
    {
        $userID = $_SESSION['id'];
        $result = Database::crud ("INSERT INTO `posts`(`id`, `author_id`, `title`, `title_image`, `small_text`, `text`, `Avaibility`, `date`) VALUES (NULL,?,?,?,?,?,1,NULL)", [$userID,$title,$imagescr,$small_text,$text]);
        return $result;
    }
    public static function getOnePost($id){

        $result = Database::get("SELECT posts.id, posts.id, posts.title_image, users.name,posts.title,posts.text,posts.avaibility,posts.date FROM `posts`INNER JOIN users ON posts.author_id = users.id WHERE posts.id = $id ");
        return $result;
    }
    public static function getComentaries($id){

        $result = Database::get("SELECT comentaries.id , users.name , users.surname , comentaries.text FROM `comentaries`INNER JOIN users ON comentaries.user_id = users.id WHERE comentaries.post_id = $id ORDER BY comentaries.id DESC");
        return $result;
    }
    public static function setComentary($postID,$comentary)
    {
        $userID = $_SESSION['id'];
        $result = Database::crud ("INSERT INTO `comentaries`(`id`, `user_id`, `post_id`, `text`) VALUES (NULL,?,?,?)",[$_SESSION['id'],$postID,$comentary]);
        return $result;
    }
    public static  function deletePost($id){
        $result = Database::set('DELETE FROM `posts` WHERE id = ? AND author_id = ? ', [$id,$_SESSION['id']]);
        if(Database::crud('SELECT * FROM posts WHERE id = ?',[$id])){
            return false;
        }
        else{
            return true;
        }
    }
}