<?php


namespace core\users;


class Admin extends User
{
    public function __construct($name, $surname, $language)
    {
        parent::__construct($name, $surname, $language);
    }
}