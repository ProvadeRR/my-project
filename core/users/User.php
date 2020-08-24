<?php


namespace core\users;

abstract class User
{
    protected $name;
    protected $surname;
    protected $language;
    protected $role;
    public function __construct($name,$surname,$language,$role = 'Гость'){
        $this->name = $name;
        $this->surname = $surname;
        $this->language = $language;
        if($role == 1)
        {
            $this->role = 'Пользователь';
        }
        if($role == 2)
        {
            $this->role = 'Администратор';
        }
    }
    public function getName(){
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function getLanguage(){
        return $this->language;
    }
    public function getRole(){
        return $this->role;
    }
}