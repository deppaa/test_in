<?php

namespace application\models;

use application\core\Model;
use application\lib\RexAPI;

class Tasks extends Model
{
	public $error;
	public $success;

	public function tasksList($id)
	{
		$params = [
			'course_id' => $id
		];
		return $this->db->row('SELECT * FROM task WHERE course_id = :course_id', $params);
	}

	public function descExist($id)
	{
		$params = [
			'id' => $id
		];
		return $this->db->row('SELECT description FROM course WHERE id = :id', $params);
	}

	public function taskList($id)
	{
		$params = [
			'id' => $id
		];

		$result = $this->db->row('SELECT * FROM task WHERE id = :id', $params)[0];

		$params1 = [
			'id' => $result['course_id']
		];

		$lang = $this->db->row('SELECT lang FROM course WHERE id = :id', $params1)[0];

		$filename = "public/userCode/" . $id . "_" . $_SESSION['authorize']['id'] . ".txt";
		$filename1 = "public/structure/" . $lang['lang'] . ".txt";

		if (file_exists($filename)) {
			$structure = $this->structureCode($filename);
		} else {
			$structure = $this->structureCode($filename1);
		}

		return $contents = [
			'task' => $result,
			'structure' => $structure,
		];
	}

	public function structureCode($filename)
	{
		$fd = fopen($filename, "r");
		$contents = fread($fd, filesize($filename));

		$contents = str_replace("\r\n", "<br>", $contents);
		fclose($fd);
		return [
			'contents' => $contents
		];
	}

	public function progressAdd($path, $id)
	{
		$params = [
			'id' => $id,
		];

		$task = $this->db->row('SELECT * FROM task WHERE id = :id', $params)[0];

		$ball = ($task['ball'] / 3) * $path;

		$solved = $task['solved'];

		$ball = round($ball, 1);

		$progress = $this->userExist($id);


		if ($progress['true'] == 'true') {
			$params2 = [
				'id' => $progress['id'],
			];

			$this->db->query("UPDATE progress SET ball = '$ball' WHERE id = :id", $params2);
		} else {

			$surname = $_SESSION['authorize']['surname'];
			$name = $_SESSION['authorize']['name'];
			$pat = $_SESSION['authorize']['pat'];
			$params3 = [
				'id' => '',
				'course_id' => $task['course_id'],
				'task_id' => $task['id'],
				'user_id' => $_SESSION['authorize']['id'],
				'ball' => $ball,
				'name' => $surname . ' ' . mb_strimwidth("$name", 0, 1) . '. ' . mb_strimwidth("$pat", 0, 1) . '. ',
				'date' => date("Y-m-d H:i:s"),
			];

			$solved++;

			$this->db->query("UPDATE task SET solved = '$solved' WHERE id = :id", $params);

			$this->db->query('INSERT INTO progress VALUES (:id, :course_id, :task_id, :user_id, :ball, :name, :date)', $params3);
		}
	}

	public function saveCode($code, $id)
	{
		$createfile = fopen("public/userCode/" . $id . "_" . $_SESSION['authorize']['id'] . ".txt", "w");
		fwrite($createfile, $code);
		fclose($createfile);
	}

	public function testProgramm($path, $id)
	{
		$this->saveCode($path, $id);

		$api  = new RexAPI;

		$check = [];
		$result = [];
		$courseId = [
			'id' => $id,
		];

		$course_id = $this->db->row('SELECT course_id FROM task WHERE id = :id', $courseId)[0];

		$param = [
			'id' => $course_id['course_id'],
		];

		$lang = $this->db->row('SELECT lang FROM course WHERE id = :id', $param)[0];

		for ($i = 1; $i <= 3; $i++) {
			$data[$i] = $this->db->row('SELECT test' . $i . '_in, test' . $i . '_out FROM task WHERE id = :id', $courseId)[0];

			$output[$i] = $api->jsonAPI($lang['lang'], $path, $data[$i]['test' . $i . '_in']);
			do {
				$sl = 0;
				sleep(2);
				$sl++;
				if ($sl == 12) {
					break;
				}
			} while (is_array($output[$i]) == false);

			$rt = str_replace("\r", "", str_replace("\n", "", $output[$i]['Result']));
			$dr = $data[$i]['test' . $i . '_out'];

			if ($rt == $dr) {
				$check[$i] = true;
			} else {
				$check[$i] = false;
			}
		}

		$amt = 0;
		foreach ($check as $key => $val) {
			if ($val == true) {
				$amt++;
			}
		}

		$this->progressAdd($amt, $id);

		foreach ($check as $key => $val) {
			if ($val == true) {
				$result['icon'][$key] = '<i class="fas fa-check"></i>';
			} else {
				$result['icon'][$key] = '<i class="fas fa-times"></i>';
			}
		}

		for ($i = 1; $i <= 3; $i++) {
			$result['out'][$i] = str_replace("\r\n", "", $output[$i]['Result']);
		}

		$this->success = $result;
		return true;
	}

	public function userExist($id)
	{
		//массив с параметрами о id задания
		$params = [
			'task_id' => $id,
		];

		//запрашиваем id пользователя и id строки в таблице progress
		$progress = $this->db->row('SELECT user_id, id  FROM progress WHERE task_id = :task_id', $params);
		//Заменить на forech
		for ($i = 0; $i < count($progress); $i++) {
			//проверяем сзвподает ли id пользователя из таблицы с id session id
			if ($progress[$i]['user_id'] == $_SESSION['authorize']['id']) {
				$path = [
					'true' => 'true',
					'id' => $progress[$i]['id'],
				];
				return $path;
			}
		}
		return false;
	}

	public function testCode($code, $input, $id)
	{
		$api  = new RexAPI;

		$params = [
			'id' => $id,
		];

		$course_id = $this->db->row('SELECT course_id FROM task WHERE id = :id', $params)[0];

		$param = [
			'id' => $course_id['course_id'],
		];

		$lang = $this->db->row('SELECT lang FROM course WHERE id = :id', $param)[0];

		$result = $api->jsonAPI($lang['lang'], $code, $input);

		$this->success = $result;

		return true;
	}
}
