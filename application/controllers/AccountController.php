<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Moder;
use application\lib\Validation;

class AccountController extends Controller
{
	public function loginAction()
	{
		$moder = new Moder;

		if (isset($_SESSION['account'])) 
		{
			$this->view->redirect('account/course');
		}
		
		$validation  = new Validation;
		if (!empty($_POST))
		{
			if (!$validation->login(['login', 'password'], $_POST)) 
			{
				$this->view->message('error', $validation->error);
			}
			elseif (!$moder->checkData($_POST['login'], $_POST['password'], 'account')) 
			{
				$this->view->message('error', 'Логин или пароль указан неверно');
			}
			elseif (!$moder->checkStatus('login', $_POST['login'], 'account')) {
				$this->view->message('error', $moder->error);
			}
			$moder->login($_POST['login'], 'account');
			$this->view->location('account/course');

		}
		$this->view->render('Авторизация студентов');
	}

	public function registrAction()
	{
		$moder = new Moder;
		$validation  = new Validation;
		if (!empty($_POST)) 
		{
			if (!$validation->registr(['login', 'email', 'password'], $_POST))
			{
				$this->view->message('error', $validation->error);
			}
			elseif (!$moder->checkLoginExist($_POST['login'], 'account')) 
			{
				$this->view->message('error', $moder->error);
			}
			elseif (!$moder->checkEmailExist($_POST['email'], 'account')) 
			{
				$this->view->message('error', $moder->error);
			}
			$id = $moder->registr($_POST, 'account');
			//$moder->loadimg($_FILES['foto']['tmp_name'], $id, 'account');
			$this->view->message('success', 'Регистрация завершена (Подтвердите E-mail)');
			$this->view->redirect('moder/login');
		}
		$this->view->render('Регистрация студентов');
	}

	public function confirmAction()
	{
		$moder = new Moder;
		if (!$moder->checkTokenExist($this->route['token'], 'account')) {
			$this->view->errorCode(403);
		}
		$moder->activate($this->route['token'], 'account');
		$this->view->redirect('account/login');
	}

	public function allcourseAction()
	{
		$vars = [
			'allCourse' => $this->model->allCourseList(),
		];
		$this->view->render('Все задания', $vars);
	}

	public function courseAction()
	{
		$vars = [
			'course' => $this->model->courseList($this->route),
		];
		$this->view->render('Мои задания', $vars);
	}

	public function profileAction()
	{
		$vars = [
			'data' => $this->model->userProfile()[0],
		];
		$this->view->render('Профиль', $vars);
	}

	public function editAction()
	{
		$this->view->render('Редактировать профиль');
	}

	public function logoutAction()
	{
		unset($_SESSION['authorize']);
		$this->view->redirect('account/login');
	}
}

?>