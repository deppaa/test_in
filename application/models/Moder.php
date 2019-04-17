<?php

namespace application\models;

use application\core\Model;

use Imagick;

class Moder extends Model
{
	public $error;

	public function taskValidate($post)
	{
		$langLen = $post['lang'];

		if (empty($post['task-number_group'])) {
				$this->error = 'Введите номер групппы';
				return false;
			}

		if (empty($post['task-name'])) {
				$this->error = 'Введите название курса';
				return false;
			}

		if (empty($post['task-desk'])) {
				$this->error = 'Описание курса не заполненно';
				return false;
			} elseif ($langLen == 'Выберите язык') {
				$this->error = 'Вы не выбрали язык.';
				return false;
			}

		if (empty($_FILES['fon']['tmp_name'])) {
				$this->error = 'Заставка не выбрана.';
				return false;
			}

		for ($i = 1; $i <= $post['count']; $i++) {
				$ballLen = iconv_strlen($post['task-ball' . $i]);
				$titleLen = iconv_strlen($post['task-title' . $i]);
				$textLen = iconv_strlen($post['task-text' . $i]);
				$input1Len = iconv_strlen($post['input-text1-' . $i]);
				$output1Len = iconv_strlen($post['output-text1-' . $i]);
				$input2Len = iconv_strlen($post['input-text2-' . $i]);
				$output2Len = iconv_strlen($post['output-text2-' . $i]);
				$input3Len = iconv_strlen($post['input-text3-' . $i]);
				$output3Len = iconv_strlen($post['output-text3-' . $i]);

				if (empty($ballLen)) {
						$this->error = 'Задание' . $i . ', не указанн вес задания.';
						return false;
					} elseif (!preg_match('#^[0-9]{1,2}$#', $ballLen)) {
					$this->error = 'Задание' . $i . ', превышен вес задания.';
					return false;
				} elseif ($titleLen < 2) {
						$this->error = 'Задание' . $i . ', название заданиия не заполнен.';
						return false;
					} elseif ($textLen < 2) {
						$this->error = 'Задание' . $i . ', текст заданиия не заполнен.';
						return false;
					} elseif ($input1Len < 1) {
						$this->error = 'Задание' . $i . ', входные данные Тест 1 должны быть не меньше 1 и не больше 8 символов.';
						return false;
					} elseif ($input2Len < 1) {
						$this->error = 'Задание' . $i . ', входные данные Тест 2 должны быть не меньше 1 и не больше 8 символов.';
						return false;
					} elseif ($input3Len < 1) {
						$this->error = 'Задание' . $i . ', входные данные Тест 3 должны быть не меньше 1 и не больше 8 символов.';
						return false;
					} elseif ($output1Len < 1) {
						$this->error = 'Задание' . $i . ', выходные данные Тест 1 должны быть не меньше 1 и не больше 8 символов.';
						return false;
					} elseif ($output2Len < 1) {
						$this->error = 'Задание' . $i . ', выходные данные Тест 2 должны быть не меньше 1 и не больше 8 символов.';
						return false;
					} elseif ($output3Len < 1) {
						$this->error = 'Задание' . $i . ', выходные данные Тест 3 должны быть не меньше 1 и не больше 8 символов.';
						return false;
					}
			}

		return true;
	}

	public function taskadd($post)
	{
		$surname = $_SESSION['moder']['surname'];
		$name = $_SESSION['moder']['name'];
		$pat = $_SESSION['moder']['pat'];
		
		$params = [
			'id' => '',
			'autor_id' => $_SESSION['moder']['id'],
			'number_group' => $post['task-number_group'],
			'title' => $post['task-name'],
			'description' => $post['task-desk'],
			'lang' => $post['lang'],
			'autor' => $surname . ' ' . mb_strimwidth("$name", 0, 1) . '. ' . mb_strimwidth("$pat", 0, 1) . '. ',
			'date' => date("Y-m-d H:i:s"),
		];

		$this->db->query('INSERT INTO course VALUES (:id, :autor_id, :number_group, :title, :description, :lang, :autor, :date)', $params);

		$lastid = $this->db->lastInsertId();

		for ($i = 1; $i <= $post['count']; $i++) {

				$paramsTask = [
					'id' => '',
					'course_id' => $lastid,
					'ball' => $post['task-ball' . $i],
					'title' => $post['task-title' . $i],
					'text' => $post['task-text' . $i],
					'test1_in' => $post['input-text1-' . $i],
					'test1_out' => $post['output-text1-' . $i],
					'test2_in' => $post['input-text2-' . $i],
					'test2_out' => $post['output-text2-' . $i],
					'test3_in' => $post['input-text3-' . $i],
					'test3_out' => $post['output-text3-' . $i],
					'solved' => '0',
				];

				$this->db->query('INSERT INTO task VALUES (:id, :course_id, :ball, :title, :text, :test1_in, :test1_out, :test2_in, :test2_out, :test3_in, :test3_out, :solved)', $paramsTask);
			}
		return $lastid;
	}

	public function loadimg($path, $id, $type)
	{
		$img = new Imagick($path);
		if ($type == 'add') {
				$img->cropThumbnailImage(1024, 768);
				$img->setImageCompressionQuality(80);
				$img->writeImage('public/preview/' . $id . '.jpg');
			} elseif ($type == 'Moder') {
				$img->cropThumbnailImage(250, 250);
				$img->setImageCompressionQuality(80);
				$img->writeImage('public/avatarsModer/' . $id . '.jpg');
			} elseif ($type == 'account') {
				$img->cropThumbnailImage(250, 250);
				$img->setImageCompressionQuality(80);
				$img->writeImage('public/avatarsAccount/' . $id . '.jpg');
			}
	}

	public function checkLoginExist($login, $type)
	{
		$params = [
			'login' => $login,
		];

		if ($type == 'moder') {
				if ($this->db->column('SELECT id FROM moder WHERE login = :login', $params)) {
						$this->error = 'Пользоватеь с таким login уже существует';
						return false;
					}

				return true;
			}

		if ($type == 'account') {
				if ($this->db->column('SELECT id FROM account WHERE login = :login', $params)) {
						$this->error = 'Пользоватеь с таким login уже существует';
						return false;
					}

				return true;
			}
	}

	public function checkEmailExist($email, $type)
	{
		$params = [
			'email' => $email,
		];

		if ($type == 'moder') {
				if ($this->db->column('SELECT id FROM moder WHERE email = :email', $params)) {
						$this->error = 'Пользоватеь с таким E-mail уже существует';
						return false;
					}
				return true;
			}

		if ($type == 'account') {
				if ($this->db->column('SELECT id FROM account WHERE email = :email', $params)) {
						$this->error = 'Пользоватеь с таким E-mail уже существует';
						return false;
					}
				return true;
			}
	}

	public function checkTokenExist($token, $type)
	{
		$params = [
			'token' => $token,
		];

		if ($type == 'moder') {
				return $this->db->column('SELECT id FROM moder WHERE token = :token', $params);
			}

		if ($type == 'account') {
				return $this->db->column('SELECT id FROM account WHERE token = :token', $params);
			}
	}

	public function activate($token, $type)
	{
		$params = [
			'token' => $token,
		];

		if ($type == 'moder') {
				$this->db->query('UPDATE moder SET status = 1, token = "" WHERE token = :token', $params);
			}

		if ($type == 'account') {
				$this->db->query('UPDATE account SET status = 1, token = "" WHERE token = :token', $params);
			}
	}

	public function createToken()
	{
		return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)), 0, 30);
	}

	public function registr($post, $type)
	{
		$token = $this->createToken();

		if ($type == 'moder') 
		{
			$params = [
				'id' => '',
				'surname' => $post['surname'],
				'name' => $post['name'],
				'pat' => $post['pat'],
				'vuz' => $post['vuz'],
				'login' => $post['login'],
				'email' => $post['email'],
				'password' => password_hash($post['password'], PASSWORD_BCRYPT),
				'agreement' => $post['check'],
				'token' => $token,
				'status' => 0,
			];
			$this->db->query('INSERT INTO moder VALUES (:id, :surname, :name, :pat, :vuz, :login, :email, :password, :agreement, :token, :status)', $params);
			mail($post['email'], 'Register', 'Confirm: http://test/moder/confirm/' . $token);
		} elseif ($type == 'account') 
		{
			$params = [
				'id' => '',
				'surname' => $post['surname'],
				'name' => $post['name'],
				'pat' => $post['pat'],
				'vuz' => $post['vuz'],
				'login' => $post['login'],
				'email' => $post['email'],
				'password' => password_hash($post['password'], PASSWORD_BCRYPT),
				'agreement' => $post['check'],
				'token' => $token,
				'status' => 0,
				'group_name' => $post['group'],
			];
				$this->db->query('INSERT INTO account VALUES (:id, :surname, :name, :pat, :vuz, :group_name, :login, :email, :password, :agreement, :token, :status)', $params);
				mail($post['email'], 'Register', 'Confirm: http://test/account/confirm/' . $token);
		}


		return $this->db->lastInsertId();
	}

	public function checkData($login, $password, $type)
	{
		$params = [
			'login' => $login,
		];
		if ($type == 'moder') {
				$hash = $this->db->column('SELECT password FROM moder WHERE login = :login', $params);
				if (!$hash or !password_verify($password, $hash)) {
						return false;
					}
				return true;
			}

		if ($type == 'account') {
				$hash = $this->db->column('SELECT password FROM account WHERE login = :login', $params);
				if (!$hash or !password_verify($password, $hash)) {
						return false;
					}
				return true;
			}
	}

	public function checkStatus($login, $data, $type)
	{
		$params = [
			$login => $data,
		];

		if ($type == 'moder') {
				$status = $this->db->column('SELECT status FROM moder WHERE ' . $login . ' = :' . $login, $params);
				if ($status != 1) {
						$this->error = 'Аккаунт ожидает подтверждения по E-mail';
						return false;
					}
				return true;
			}

		if ($type == 'account') {
				$status = $this->db->column('SELECT status FROM account WHERE ' . $login . ' = :' . $login, $params);
				if ($status != 1) {
						$this->error = 'Аккаунт ожидает подтверждения по E-mail';
						return false;
					}
				return true;
			}
	}

	public function login($login, $type)
	{
		$params = [
			'login' => $login,
		];

		if ($type == 'moder') {
				$data = $this->db->row('SELECT * FROM moder WHERE login = :login', $params);
				$_SESSION['moder'] = $data[0];
			}
		if ($type == 'account') {
				$data = $this->db->row('SELECT * FROM account WHERE login = :login', $params);
				$_SESSION['authorize'] = $data[0];
			}
	}

	public function istaskExist($id)
	{
		$params = [
			'id' => $id,
		];

		return $this->db->column('SELECT id FROM course WHERE id = :id', $params);
	}

	public function taskDelate($id)
	{
		$params = [
			'id' => $id,
		];

		$del_id = $this->db->row('SELECT id FROM task WHERE course_id = :id', $params);

		$this->db->query('DELETE FROM course WHERE id = :id', $params);

		$filename = 'public/preview/' . $id . '.jpg';

		if (file_exists($filename)) 
		{
				unlink($filename);
		}

		$dir = 'public/userCode';
		foreach ($del_id as $val) 
		{
			foreach (glob($dir.'/'.$val['id'].'_*.txt') as $file) 
			{
				if (file_exists($file)) 
				{
					unlink($file);
				}
			}
		}
	}
		

	public function courseList()
	{
		$params = [
			'autor_id' => $_SESSION['moder']['id'],
		];
		return $this->db->row('SELECT * FROM course WHERE autor_id = :autor_id ORDER BY id DESC', $params);
	}

	public function tasksList($id)
	{
		$params = [
			'course_id' => $id
		];
		return $this->db->row('SELECT * FROM task WHERE course_id = :course_id', $params);
	}

	public function nameGroup($id)
	{
		$params = [
			'id' => $id
		];
		return $this->db->row('SELECT number_group FROM course WHERE id = :id', $params);
	}

	public function userList($id)
	{
		$params = [
			'task_id' => $id
		];
		return $this->db->row('SELECT * FROM progress WHERE task_id = :task_id', $params);
	}

	public function codeShow($token)
	{
		$filename = "public/userCode/" . $token . ".txt";
		$fd = fopen($filename, "r");
		$contents = fread($fd, filesize($filename));

		$contents = str_replace("\r\n", "<br>", $contents);
		fclose($fd);
		return [
			'contents' => $contents
		];
	}

	public function editCourse($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM course WHERE id = :id', $params);
	}

	public function editTask($id)
	{
		$params = [
			'course_id' => $id,
		];

		return $this->db->row('SELECT * FROM task WHERE course_id = :course_id', $params);
	}

	public function updateCourse($post, $id)
	{
		$params = [
			'id' => $id,
			'number_group' => $post['task-number_group'],
			'title' => $post['task-name'],
			'description' => $post['task-desk'],
			'lang' => $post['lang'],
			'date' => date("Y-m-d H:i:s"),
		];

		$this->db->query('UPDATE course SET number_group = :number_group, title = :title, description = :description, lang = :lang, date = :date WHERE id = :id', $params);

		$progres = $this->editTask($id);

		if (is_array($progres)) 
		{
			for ($i = 1; $i < count($progres)+1; $i++) 
			{
				$params = [
					'id' => '',
					'course_id' => $id,
					'ball' => $post['task-ball' . $i],
					'title' => $post['task-title' . $i],
					'text' => $post['task-text' . $i],
					'test1_in' => $post['input-text1-' . $i],
					'test1_out' => $post['output-text1-' . $i],
					'test2_in' => $post['input-text2-' . $i],
					'test2_out' => $post['output-text2-' . $i],
					'test3_in' => $post['input-text3-' . $i],
					'test3_out' => $post['output-text3-' . $i],
					'solved' => '0',
				];

				//$this->db->query( 'UPDATE course SET ball = :ball, title = :title, text = :text, test1_in = :test1_in, test1_out = :test1_out, test2_in = :test2_in, test2_out = :test2_out, test3_in = :test3_in, test3_out = :test3_out WHERE id = :id', $params);
			}
			$this->taskSelect($id, $post, count($progres)+1);
		}
		else
		{
			$this->taskSelect($id, $post, 1);
		}

		return true;
	}

	public function taskSelect($id, $post, $path)
	{
		for ($i = $path; $i <= $post['count']; $i++) 
		{
			$params = [
				'id' => '',
				'course_id' => $id,
				'ball' => $post['task-ball' . $i],
				'title' => $post['task-title' . $i],
				'text' => $post['task-text' . $i],
				'test1_in' => $post['input-text1-' . $i],
				'test1_out' => $post['output-text1-' . $i],
				'test2_in' => $post['input-text2-' . $i],
				'test2_out' => $post['output-text2-' . $i],
				'test3_in' => $post['input-text3-' . $i],
				'test3_out' => $post['output-text3-' . $i],
				'solved' => '0',
			];

			//$this->db->query('INSERT INTO task VALUES (:id, :course_id, :ball, :title, :text, :test1_in, :test1_out, :test2_in, :test2_out, :test3_in, :test3_out, :solved)', $params);
		}
	}
}
 