<?php

namespace application\controllers;

use application\core\Controller;

class TasksController extends Controller
{
	
	//Страница всех курсов
	public function alltasksAction()
	{
		$this->view->render('Все задания');
	}

	//Страница с заданиями в курсе
	public function tasksAction()
	{
		$vars = [
			//Вывод списка заданий в курсе
			'tasks' => $this->model->tasksList($this->route['id']),
			//Вывод описания курса
			'desc' => $this->model->descExist($this->route['id'])[0],
		];
		$this->view->render('Задания', $vars);
	}

	//Страница с заданием
	public function taskAction()
	{
		$result = $this->model->taskList($this->route['id']);

		$vars = [
			//Вывод задания
			'task' => $result['task'],
			'structure' => $result['structure'],
		];

		if(!empty($_POST))
		{
			if ($_POST['type'] == 3) 
			{
				//Проверка написанного кода, сохранение его в файл, добавление информации в табл progres.
				if ($this->model->testProgramm($_POST['code'], $this->route['id']))
				{
					$this->view->message('success', $this->model->success);
				}
			}
			elseif ($_POST['type'] == 1)
			{
				//Проверка написанного кода
				if ($this->model->testCode($_POST['code'], $_POST['input'], $this->route['id']))
				{
					$this->view->message('success', $this->model->success);
				}
			}
			
		}

		$this->view->render('Задание', $vars);
	}
}

?>