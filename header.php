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

  <a class="navbar-brand" href="#">ПОСОБИЕ</a>
  <!--кнопка, которая появляется при сжатии окна-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!--Блок который будет скрывать навигацию -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  	<div>
    	<ul class="navbar-nav mr-auto">
     		<li class="nav-item active">
        		<a class="nav-link" href="#">Главная<span class="sr-only">(current)</span></a>
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
        <a class="nav-link" href="#">Авторизация<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Регистрация</a>
      </li>
  </ul>
	</div>

</div>
</nav>
</div>