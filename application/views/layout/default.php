<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="/public/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="/public/style/bootstrap.min.css">
	<link rel="stylesheet" href="/public/style/style.css">
	<script src="/public/scripts/jquery.min.js"></script>
	<script src="/public/scripts/form.js"></script>
	<title><?php echo $title ?></title>
</head>
<body>
	<?php if ($this->route['action'] != 'login' & $this->route['action'] != 'registr'): ?>
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
						<li>
							<a class="nav-link" href="/">Главная</a>
						</li>
						<li class="">
							<a class="nav-link" href="#">О сайте <span class="caret"></span></a>
						</li>
						<li class="">
							<a class="nav-link" href="/account/login">Вход <span class="caret"></span></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
	<?php endif; ?>
	<?php echo $content ?>
	<?php if ($this->route['action'] != 'login' & $this->route['action'] != 'registr'): ?>
		<footer>
			<div class="container">
				
			</div>
		</footer>
	<?php endif; ?>
	<script src="/public/scripts/popper.js"></script>
	<script src="/public/scripts/bootstrap.js"></script>
</body>
</html>