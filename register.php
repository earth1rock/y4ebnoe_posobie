<?php
    //Запускаем сессию
session_start();

    //Добавляем файл подключения к БД
require_once("dbconnect.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

     /*
        Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, значит пользователь зашёл на эту страницу напрямую. В этом случае выводим ему сообщение об ошибке.
    */

        if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"]))
        {

   	// Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.
        	if(isset($_POST["first_name"]))
        	{

                //Обрезаем пробелы с начала и с конца строки
        		$first_name = trim($_POST["first_name"]);

                //Проверяем переменную на пустоту
        		if(!empty($first_name))
        		{
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
        			$first_name = htmlspecialchars($first_name, ENT_QUOTES);
        		}

        		else
        		{
                    // Сохраняем в сессию сообщение об ошибке.
        			$_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваше имя</p>";

                    //Возвращаем пользователя на страницу регистрации
        			header("HTTP/1.1 301 Moved Permanently");
        			header("Location: ".$address_site."/form_registr.php");

                    //Останавливаем скрипт
        			exit();
        		}

        	}

        	else
            {
                // Сохраняем в сессию сообщение об ошибке.
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с именем</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_registr.php");

                //Останавливаем скрипт
                exit();
            }

            if(isset($_POST["last_name"]))
            {

                //Обрезаем пробелы с начала и с конца строки
                $last_name = trim($_POST["last_name"]);

                //Проверяем переменную на пустоту
                if(!empty($last_name))
                {
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $last_name = htmlspecialchars($last_name, ENT_QUOTES);
                }

                else
                {
                    // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Вашу фамилию</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_registr.php");

                    //Останавливаем скрипт
                    exit();
                }

            }

            else
            {
                // Сохраняем в сессию сообщение об ошибке.
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с фамилией</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_registr.php");

                //Останавливаем скрипт
                exit();
            }

            if(isset($_POST["middle_name"]))
            {

                //Обрезаем пробелы с начала и с конца строки
                $middle_name = trim($_POST["middle_name"]);

            }

            else
            {
                $middle_name = NULL;
            }

        }


        else
        {

            exit ("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");

        }



     ?>

