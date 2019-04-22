<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{
	public $error;

	public function allCourseList()
	{
		$params = [
		];
		return $this->db->row('SELECT * FROM course ORDER BY id DESC', $params);
	}

	public function courseList()
	{
		$params = [
			'number_group' => $_SESSION['authorize']['group_name'],
		];
		return $this->db->row('SELECT * FROM course WHERE number_group = :number_group ORDER BY id DESC', $params);
	}

	public function userProfile()
	{
		$params = [
			'id' => $_SESSION['authorize']['id'],
		];
		
		return $this->db->row('SELECT * FROM account WHERE id = :id', $params);
	}

	public function coursDataProgres()
	{
		$result = [];
		
		$course = $this->courseList();

		for ($i=0; $i < count($course) ; $i++) 
		{ 
			$params = [
				'course_id' => $course[$i]['id'],
			];

			$task = $this->db->row('SELECT * FROM task WHERE course_id = :course_id', $params);

			$oneP = 0;

			for ($a=0; $a < count($task) ; $a++) 
			{ 
				$oneP += $task[$a]['ball'];
			}

			$oneP /=100;

			$params = [
				'course_id' => $task[$i]['course_id'],
			];

			$progess = $this->db->row('SELECT * FROM progress WHERE course_id = :course_id', $params);

			$ball = 0;
			
			for ($b=0; $b < count($progess) ; $b++) 
			{ 
				if ( $_SESSION['authorize']['id'] == $progess[$b]['user_id']) 
				{
					$ball += $progess[$b]['ball'];
				}
			}

			$ball/=$oneP;

			$result[$i]['name'] = $course[$i]['title'];
			$result[$i]['ball'] = round($ball);
		}

		return $result;		
	}

	public function personalCoursProgres()
	{
		$path = [];
		$path2 = [];
		$params1 = 0;
		$params2 = 0;
		$course = $this->courseList();

		for ($i = 0; $i < count($course); $i++)
		{
			$oneP = 0;
			$ball = 0;
			$params = [
				'course_id' => $course[$i]['id'],
			];

			$task = $this->db->row('SELECT * FROM task WHERE course_id = :course_id', $params);

			for ($a = 0; $a < count($task); $a++) 
			{
					$oneP += $task[$a]['ball'];
			}

			$path[$i]['oneP'] = $oneP;

			$params = [
				'course_id' => $task[$i]['course_id'],
			];

			$progess = $this->db->row('SELECT * FROM progress WHERE course_id = :course_id', $params);

			for ($b = 0; $b < count($progess); $b++) 
			{
				if ($_SESSION['authorize']['id'] == $progess[$b]['user_id']) 
				{
					$ball += $progess[$b]['ball'];
				}
			}

			$path2[$i]['ball'] = round($ball);
		}

		for ($i = 0; $i < count($path); $i++)
		{
			$params1 += $path[$i]['oneP'];
			$params2 += $path2[$i]['ball'];
		}

		return round($params2 / ($params1 / 100));
	}

	public function editProfile($post)
	{
		$moder = new Moder;

		if (is_array($_FILES['foto']['tmp_name']))
		{
			unlink('public/avatarsAccount/' . $_SESSION['authorize']['id'] . '.jpg');
			$moder->loadimg($_FILES['foto']['tmp_name'], $_SESSION['authorize']['id'], 'account');
		}
		
		$params = [
			'id' => $_SESSION['authorize']['id'],
			'surname' => $post['surname'],
			'name' => $post['name'],
			'pat' => $post['pat'],
			'vuz' => $post['vuz'],
			'group_name' => $post['group'],
			'login' => $post['login'],
		];

		$this->db->row('UPDATE account SET surname = :surname, name = :name, pat = :pat, vuz = :vuz, group_name = :group_name, login = :login WHERE id = :id', $params);

		$data = $this->userProfile();
		unset($_SESSION['authorize']);
		$_SESSION['authorize'] = $data[0];
		return true;
	}
}

?>