<?php

//Подключение классов

use core\App;

// Пути

define('ROOT' , __DIR__ . '/../');
define('DIR' , __DIR__);


// Роли
define('GUEST' , 0 );
define('DEFAULT_USER', 1);
define('ADMIN', 2);
define('CLASS_ADMIN',\core\users\Admin::class);
define('CLASS_DEFAULT_USER',\core\users\DefaultUser::class);
define('CLASS_GUEST',\core\users\Guest::class);


//Убираем слеш слева
$query = ltrim($_SERVER['REQUEST_URI'], "/");

// Подключение авторегистрации классов

require ROOT . '/settings/autoregister.php';

//Запуск сессии

session_start();
// Запуск приложения

App::Instance();
App::run($query);
