<?php

namespace application\lib;

class Validation
{
	public $error;

    public function registr($input, $post) 
	{
        foreach ($post as $key => $val)
        {
            if (empty($post[$key]))
            {
				$this->error = 'Все поля должны быть заполненны.';
				return false;
            }
		}

        $rules = [
			'login' => [
				'pattern' => '#^[A-z0-9]{3,15}$#',
				'message' => 'Логин указан не верно (разрешены только латинские буквы и цифры, длинной от 3 до 15 символов)',
			],
			'email' => [
				'pattern' => '#^([A-z0-9_.-]{1,20}+)@([A-z0-9_.-]+)\.([A-z\.]{2,10})$#',
				'message' => 'E-mail адрес указан неверно',
			],
			'password' => [
				'pattern' => '#^[A-z0-9]{8,30}$#',
				'message' => 'Пароль указан не верно (разрешены только латинские буквы и цифры, длинной от 8 до 30 символов)',
			],
        ];
        
        foreach ($input as $val) 
		{
			if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) 
			{
				$this->error = $rules[$val]['message'];
				return false;
			}
		}
		
		if($post['password'] != $post['password2'])
		{
			$this->error = 'Пароли не совпадают.';
			return false;
		}
        
        if (empty($post['check'])) 
		{
			$this->error = 'Необходимо принять пользовательское соглашение';
			return false;
        }
        
        return true;
	}
	
	public function login($input, $post)
	{
		$rules = [
			'login' => [
				'pattern' => '#^[A-z0-9]{3,15}$#',
				'message' => 'Поле login не должно быть пустым',
			],
			'password' => [
				'pattern' => '#^[A-z0-9]{8,30}$#',
				'message' => 'Поле password не должно быть пустым',
			],
        ];
        
        foreach ($input as $val) 
		{
			if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) 
			{
				$this->error = $rules[$val]['message'];
				return false;
			}
		}

		return true;
	}
}