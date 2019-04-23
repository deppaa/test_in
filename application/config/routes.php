<?php

return 
[
	//MaineController

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'about' => [
		'controller' => 'main',
		'action' => 'about',
	],

	//AcountController

	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'account/registr' => [
		'controller' => 'account',
		'action' => 'registr',
	],

	'account/profile' => [
		'controller' => 'account',
		'action' => 'profile',
	],

	'account/logout' => [
		'controller' => 'account',
		'action' => 'logout',
	],

	'account/edit' => [
		'controller' => 'account',
		'action' => 'edit',
	],

	'account/course' => [
		'controller' => 'account',
		'action' => 'course',
	],

	'account/allcourse' => [
		'controller' => 'account',
		'action' => 'allcourse',
	],
	
	'account/confirm/{token:\w+}' => [
		'controller' => 'account',
		'action' => 'confirm',
	],

	//AdminController

	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],

	'admin/stat' => [
		'controller' => 'admin',
		'action' => 'stat',
	],

	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],

	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],

	'admin/delate/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delate',
	],

	'admin/tasks' => [
		'controller' => 'admin',
		'action' => 'tasks',
	],

	//ModerController

	'moder/tasks' => [
		'controller' => 'moder',
		'action' => 'tasks',
	],

	'moder/tasksmore/{id:\d+}' => [
		'controller' => 'moder',
		'action' => 'tasksmore',
	],

	'moder/taskmore/{id:\d+}' => [
		'controller' => 'moder',
		'action' => 'taskmore',
	],

	'moder/code/{token:\w+}' => [
		'controller' => 'moder',
		'action' => 'code',
	],

	'moder/condition/{id:\d+}' => [
		'controller' => 'moder',
		'action' => 'condition',
	],

	'moder/login' => [
		'controller' => 'moder',
		'action' => 'login',
	],

	'moder/registr' => [
		'controller' => 'moder',
		'action' => 'registr',
	],

	'moder/edit/{id:\d+}' => [
		'controller' => 'moder',
		'action' => 'edit',
	],

	'moder/delate/{id:\d+}' => [
		'controller' => 'moder',
		'action' => 'delate',
	],

	'moder/add' => [
		'controller' => 'moder',
		'action' => 'add',
	],

	'moder/logout' => [
		'controller' => 'moder',
		'action' => 'logout',
	],

	'moder/confirm/{token:\w+}' => [
		'controller' => 'moder',
		'action' => 'confirm',
	],
	//TasksController

	'tasks/alltasks' => [
		'controller' => 'tasks',
		'action' => 'alltasks',
	],

	'tasks/tasks/{id:\d+}' => [
		'controller' => 'tasks',
		'action' => 'tasks',
	],

	'tasks/task/{id:\d+}' => [
		'controller' => 'tasks',
		'action' => 'task',
	],

];

?>