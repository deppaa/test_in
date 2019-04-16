<?php

require_once 'application/lib/dev.php';

use application\core\Router;

//автозагрузка
spl_autoload_register(function ($class_name) 
{
	$path = str_replace('\\', '/', $class_name. '.php');
	//проверяем наличие подключаемого файла
	if (file_exists($path)) 
	{
		require_once $path;
	}
});

session_start();

//Зоздаем обект класса рутер
$router  = new Router;

//из класса рутер вызываем функцию Run
$router -> Run();

?>