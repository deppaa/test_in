<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
	
	public function loginAction()
	{
		if (!empty($_POST))
		{
			if (!$this->model->login($_POST))
			{
				$this->view->message('error', $this->model->error);
			}
			$this->view->location('admin/stat');
		}
		$this->view->render('Вход для адинистратора');
	}

	public function statAction()
	{
		$vars =[
			'numberCours' => $this->model->numberCours(),
			'numberTask' => $this->model->numberTask(),
			'numberStud' => $this->model->numberStud(),
			'numberModer' => $this->model->numberModer(),
		];
		$this->view->render('Статистика сайта', $vars);
	}

	public function editAction()
	{
		if (!empty($_POST)) {
				$this->model->updateCourse($_POST, $this->route['id']);
				$this->view->messageAndLocation('success', 'Курс обновлен', 'admin/tasks');
			}

		if (!$this->model->istaskExist($this->route['id'])) {
				$this->view->errorCode(404);
			}

		$vars = [
			'editCourse' => $this->model->editCourse($this->route['id'])[0],
			'editTask' => $this->model->editTask($this->route['id']),
		];
		$this->view->render('Редактировать курс', $vars);
	}

	public function tasksAction()
	{
		$vars = [
			'course' => $this->model->courseList(),
		];
		$this->view->render('Все курсы', $vars);
	}

	public function delateAction()
	{
		if (!$this->model->istaskExist($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->taskDelate($this->route['id']);
		$this->view->redirect('admin/tasks');
		exit('Удалить курс');
	}

	public function logoutAction()
	{
		unset($_SESSION['admin']);
		$this->view->redirect('admin/login');
	}
}

?>