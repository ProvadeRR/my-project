<?php


namespace core\users;


class Admin extends User
{
    public function __construct($name, $surname, $language, $role = 'Гость')
    {
        parent::__construct($name, $surname, $language, $role);
    }
}