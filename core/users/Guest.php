<?php


namespace core\users;


class Guest extends User
{
    protected $language = 'ru';

    public function __construct($name, $surname, $language,$role = 'Гость')
    {

    }
}