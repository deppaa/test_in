<?php

namespace application\core;

class View
{
	public $path;
	public $route;
	//public $layout = 'default';
	
	function __construct($route)
	{
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function sessionExists()
	{
		if (isset($_SESSION['authorize'])) 
		{
			return 'authorize';
		}
		elseif (isset($_SESSION['admin'])) 
		{
			return 'admin';
		}
		elseif (isset($_SESSION['moder'])) 
		{
			return 'moder';
		}
		return 'default';
	}

	public function userInfo()
	{
		$sessionName = $this->sessionExists();
		$id = $_SESSION[$sessionName]['id'];
		$surname = $_SESSION[$sessionName]['surname'];
		$name = $_SESSION[$sessionName]['name'];
		$pat = $_SESSION[$sessionName]['pat'];

		return $userinfo = [
			'user' => $surname.' '.mb_strimwidth("$name", 0, 1).'. '.mb_strimwidth("$pat", 0, 1).'. ',
			'id' => $id,
		];
	}

	public function render($title, $vars = [])
	{
		if ($this->sessionExists() != 'default' && $this->sessionExists() != 'admin') {
			$userinfo = $this->userInfo();
			extract($userinfo);
		}
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
		if (file_exists($path)) 
		{
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layout/'.$this->sessionExists().'.php';
		}
	}

	public function redirect($url) 
	{
		header('Location: /'.$url);
		exit;
	}

	public static function errorCode($code) 
	{
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) 
		{
			require $path;
		}
		exit;
	}

	public function message($status, $message) 
	{
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

	public function location($url) 
	{
		exit(json_encode(['url' => $url]));
	}

	public function messageAndLocation($status, $message, $url)
	{
		exit(json_encode(['status' => $status, 'message' => $message, 'url' => $url]));
	}
}

?>