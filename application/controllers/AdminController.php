<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
	
	public function loginAction()
	{
		$this->view->render('Вход для адинистратора');
	}

	public function statAction()
	{
		$this->view->render('Статистика сайта');
	}

	public function editAction()
	{
		$this->view->render('Редактировать куры');
	}

	public function delateAction()
	{
		exit('Удалить курс');
	}

	public function logoutAction()
	{
		exit('Выход');
	}
}

?>