<?php
    //Запускаем сессию
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RewuEge</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

	<div class="wrapper">

		<div class="header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

				<a class="navbar-brand" href="/index.php">ПОСОБИЕ</a>
				<!--кнопка, которая появляется при сжатии окна-->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!--Блок который будет скрывать навигацию -->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<div>
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="/index.php">Главная<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Личный кабинет</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Варианты</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Банк заданий</a>
							</li>
						</ul>
					</div>
					<div class="ml-auto">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" data-toggle="modal" data-target="#exampleModal"  href="#">Авторизация<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/form_registr.php">Регистрация</a>
							</li>
						</ul>
					</div>

					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="GET" action="index.php">
									<div class="modal-body">

										<div class="form-group">
											<label for="exampleInputEmail1">E-mail</label>
											<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" id="exampleInputPassword1">
										</div>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
										<button type="button submit" class="btn btn-primary">Авторизоваться</button>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
			</nav>
		</div>