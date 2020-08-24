<?php


namespace core\users;

abstract class User
{
    protected $name;
    protected $surname;
    protected $language;
    public function __construct($name,$surname,$language){
        $this->name = $name;
        $this->surname = $surname;
        $this->language = $language;
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
}