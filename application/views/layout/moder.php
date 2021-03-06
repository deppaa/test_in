<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="shortcut icon" href="/public/img/favicon.ico" type="image/x-icon">

	<script src="/public/scripts/jquery.min.js"></script>

	<script src="/public/codemirror/lib/codemirror.js"></script>
	<script src="/public/codemirror/addon/edit/closebrackets.js"></script>

	<link rel="stylesheet" href="/public/codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="/public/codemirror/theme/material.css">

	<link rel="stylesheet" href="/public/style/bootstrap.min.css">
	<link rel="stylesheet" href="/public/style/style.css">
	<script src="/public/scripts/form.js"></script>

	<title><?php echo $title ?></title>
</head>
<body>
	<header class="sticky-top">
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #23282b;">
			<a href="#" class="logo navbar-brand">
				<img src="/public/img/brand.png" alt="" class="navbar-brand__img" width="30px" height="30px;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Курсы <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="nav-link" href="/moder/add">Добавить</a></li>
							<li><a class="nav-link" href="/moder/tasks">Все курсы</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Профиль <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="nav-link" href="#">Редактировать</a></li>
							<li class="divider"></li>
							<li><a class="nav-link" href="/moder/logout">Выход</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="navbar-right d-flex">
				<h3 class="user-name"><?php echo $user ?></h3>
				<img class="user-avatar" src="/public/avatarsModer/<?php echo $id ?>.jpg" alt="" width="40px" height="40px">
			</div>
		</nav>
	</header>
	<?php echo $content ?>
	<footer>
		<div class="container">

		</div>
	</footer>
	<script src="/public/scripts/popper.js"></script>
	<script src="/public/scripts/bootstrap.js"></script>
	<script src="/public/scripts/add-block.js"></script>
	<script src="/public/scripts/codm.js"></script>
</body>
</html>