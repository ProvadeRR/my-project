<?php


namespace core\users;


class DefaultUser extends User
{
   public function __construct($name, $surname, $language, $role = '')
   {
       parent::__construct($name, $surname, $language, $role);
   }
}