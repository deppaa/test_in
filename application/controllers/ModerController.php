<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Validation;

class ModerController extends Controller
{
	
	public function tasksAction()
	{
		$vars = [
			'course' => $this->model->courseList(),
		];
		$this->view->render('Все курсы', $vars);
	}

	public function tasksmoreAction()
	{
		$vars = [
			'tasks' => $this->model->tasksList($this->route['id']),
			'group' => $this->model->nameGroup($this->route['id'])[0],
		];
		$this->view->render('Статистика по задачам', $vars);
	}

	public function taskmoreAction()
	{
		$vars = [
			'users' => $this->model->userList($this->route['id']),
		];

		$this->view->render('Статистика задачи', $vars);
	}

	public function codeAction()
	{
		$vars = [
			'code' => $this->model->codeShow($this->route['token']),
		];

		$this->view->render('Код', $vars);
	}

	public function conditionAction()
	{

		$this->view->render('Условие');
	}

	public function loginAction()
	{
		if (isset($_SESSION['moder'])) 
		{
			$this->view->redirect('moder/tasks');
		}

		$validation  = new Validation;
		if (!empty($_POST)) 
		{
			if (!$validation->login(['login', 'password'], $_POST)) 
			{
				$this->view->message('error', $validation->error);
			}
			elseif (!$this->model->checkData($_POST['login'], $_POST['password'], 'moder')) 
			{
				$this->view->message('error', 'Логин или пароль указан неверно');
			}
			elseif (!$this->model->checkStatus('login', $_POST['login'], 'moder')) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->login($_POST['login'], 'moder');
			$this->view->location('moder/tasks');

		}
		$this->view->render('Авторизация преподователей');
	}
	//Регистрация не работает редирект включить имадж
	public function registrAction()
	{
		$validation  = new Validation;
		if (!empty($_POST)) 
		{
			if (!$validation->registr(['login', 'email', 'password'], $_POST))
			{
				$this->view->message('error', $validation->error);
			}
			elseif (!$this->model->checkLoginExist($_POST['login'], 'moder')) 
			{
				$this->view->message('error', $this->model->error);
			}
			elseif (!$this->model->checkEmailExist($_POST['email'], 'moder')) 
			{
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->registr($_POST, 'moder');
			//$this->model->loadimg($_FILES['foto']['tmp_name'], $id, 'Moder');
			$this->view->message('success', 'Регистрация завершена (Подтвердите E-mail)');
			$this->view->redirect('moder/login');
		}
		$this->view->render('Регистрация преподователей');
	}
	//Добавление курса включить имадж
	public function addAction()
	{
		if (!empty($_POST)) 
		{
			if (!$this->model->taskValidate($_POST)) 
			{
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->taskadd($_POST);
			//$this->model->loadimg($_FILES['fon']['tmp_name'], $id, 'add');
			$this->view->messageAndLocation('success', 'Курс добавлен', 'moder/tasks');
		}
		$this->view->render('Добавить курс');
	}

	public function confirmAction()
	{
		if (!$this->model->checkTokenExist($this->route['token'], 'moder')) {
			$this->view->errorCode(403);
		}
		$this->model->activate($this->route['token'], 'moder');
		$this->view->redirect('moder/login');
	}

	public function editAction()
	{
		if (!empty($_POST))
		{
			if (!$this->model->taskValidate($_POST)) 
			{
				$this->view->message('error', $this->model->error);
			}
			if($this->model->updateCourse($_POST, $this->route['id']))
			{
				$this->view->messageAndLocation('success', 'Курс обновлен', 'moder/tasks');
			}
		}

		if (!$this->model->istaskExist($this->route['id']))
		{
			$this->view->errorCode(404);
		}

		$vars = [
			'editCourse' => $this->model->editCourse($this->route['id'])[0],
			'editTask' => $this->model->editTask($this->route['id']),
		];

		$this->view->render('Редактировать', $vars);
	}

	public function delateAction()
	{
		if (!$this->model->istaskExist($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->taskDelate($this->route['id']);
		$this->view->redirect('moder/tasks');
	}

	public function logoutAction()
	{
		unset($_SESSION['moder']);
		$this->view->redirect('moder/login');
	}
}

?>