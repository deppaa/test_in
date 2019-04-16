<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{
	public $error;

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
}

?>