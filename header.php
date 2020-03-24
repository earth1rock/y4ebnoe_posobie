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
	<script src="/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			"use strict";
                //================ Проверка email ==================

                //регулярное выражение для проверки email
                var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
                var mail = $('input[name=email]');

                 //блюр - это когда теряет инпут теряет фокус
                 mail.blur(function(){
                    //возвращает или устанавливает значение value
                    if(mail.val() != ''){

                        // Проверяем, если введенный email соответствует регулярному выражению
                        if(mail.val().search(pattern) == 0){
                            // Убираем сообщение об ошибке
                            $('#valid_email_message').text('');

                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }else{
                            //Выводим сообщение об ошибке
                            $('#valid_email_message').text('Не правильный Email');

                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);
                        }
                    }else{
                    	$('#valid_email_message').text('Введите Ваш e-mail');
                    }
                });

                //================ Проверка длины пароля ==================
                var password = $('input[name=password]');

                password.blur(function(){
                	if(password.val() != ''){

                        //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                        if(password.val().length < 6){
                            //Выводим сообщение об ошибке
                            $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);

                        }else{
                            // Убираем сообщение об ошибке
                            $('#valid_password_message').text('');

                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                    	$('#valid_password_message').text('Введите пароль');
                    }
                });

                var password2 = $('input[name=password2]');

                password2.blur(function(){
                	if(password2.val() != ''){

                        //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                        if(password.val() != password2.val()){
                            //Выводим сообщение об ошибке
                            $('#checkPw').text('Пароли не совпадают');

                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);

                        }else{
                            // Убираем сообщение об ошибке
                            $('#checkPw').text('');

                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                    	$('#checkPw').text('Введите подтверждение пароля');
                    }
                });


            });
        </script>

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

    							<?php
   								//Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    							//иначе выводим сообщение о том, что он уже авторизован
    							if(!isset($_SESSION["email"]) && !isset($_SESSION["password"]))
    							{
								?>
    							<li class="nav-item">
    								<a class="nav-link" data-toggle="modal" data-target="#exampleModal"  href="#">Авторизация<span class="sr-only">(current)</span></a>
    							</li>

    							

    							<li class="nav-item">
    								<a class="nav-link" href="/form_registr.php">Регистрация</a>
    							</li>
    							<?php 
    							}
    							else
    							{
    							?>
    							<li class="nav-item">
    								<a class="nav-link" href="/logout.php">Выход</a>
    							</li>
    							<?php
    							}
    							?>
    						</ul>
    					</div>

    					<?php
   								//Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    							//иначе выводим сообщение о том, что он уже авторизован
    							if(!isset($_SESSION["email"]) && !isset($_SESSION["password"]))
    							{
								?>

    					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" a-hidden="true">
    						<div class="modal-dialog modal-dialog-centered" role="document">
    							<div class="modal-content">
    								<div class="modal-header">
    									<h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
    									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    										<span aria-hidden="true">&times;</span>
    									</button>
    								</div>
    								<form method="POST" action="auth.php">
    									<div class="modal-body">

    										<div class="form-group">
    											<label for="exampleInputEmail1">E-mail</label>
    											<input type="email" name="authemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    										</div>
    										<div class="form-group">
    											<label for="exampleInputPassword1">Password</label>
    											<input type="password" name="authpassword" class="form-control" id="exampleInputPassword1">
    										</div>

    									</div>
    									<div class="modal-footer">
    										<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
    										
    										<button type="submit" class="btn btn-primary" name="btn_submit_auth" value="btn_submit_auth">Авторизоваться</button>
    									
    								</form>
    							</div>
    						</div>
    					</div>
    					<?php 
    							}
    							?>

    				</div>
    			</nav>
    		</div>