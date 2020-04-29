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
    Проверяем была ли отправлена форма, то есть была ли нажата кнопка Войти. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том что он зашёл на эту страницу напрямую.
    */
    if(isset($_POST["btn_submit_auth"]) && !empty($_POST["btn_submit_auth"]))
    {
        //(2) Место для обработки почтового адреса
            //Обрезаем пробелы с начала и с конца строки
        $email = trim($_POST["authemail"]);
        if(isset($_POST["authemail"]))
        {

            if(!empty($email))
            {
                $email = htmlspecialchars($email, ENT_QUOTES);

                    //Проверяем формат полученного почтового адреса с помощью регулярного выражения
                $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

                    //Если формат полученного почтового адреса не соответствует регулярному выражению
                if( !preg_match($reg_email, $email))
                {
                        // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправильный email</p>";

                        //Возвращаем пользователя на страницу авторизации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");

                        //Останавливаем скрипт
                    exit();
                }

                $result_query_select = $mysqli->query("SELECT email FROM `users` WHERE email = '".$email."'");

                if(!$result_query_select)
                {
                    // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/index.php");

                    //Останавливаем скрипт
                    exit();
                }

                else
                {

                //Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
                    if($result_query_select->num_rows == 1)
                    {

                        while ($row = $result_query_select->fetch_array())
                        {
                            $email_check = $row['email'];
                        }

                    }

                    else
                        {
                               // Сохраняем в сессию сообщение об ошибке.
                            $_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин/пароль!</p>";

                            //Возвращаем пользователя на страницу регистрации
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."/form_auth.php");

                            //Останавливаем скрипт
                            exit();
                        }

                }
                $result_query_select->close();

            }


            else
            {
                    // Сохраняем в сессию сообщение об ошибке.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Заполните данные для авторизации!.</p>";

                    //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");

                    //Останавливаем скрипт
                exit();
            }
        }


        else
        {
                // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода Email</p>";

                //Возвращаем пользователя на страницу авторизации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/index.php");

                //Останавливаем скрипт
            exit();
        }


            //(3) Место для обработки пароля
        if(isset($_POST["authpassword"]))
        {

                //Обрезаем пробелы с начала и с конца строки
            $password = trim($_POST["authpassword"]);

            if(!empty($password))
            {
                $password = htmlspecialchars($password, ENT_QUOTES);

                    //(4) Место для составления запроса к БД
                    //Запрос в БД на выборке пользователя.
                $result_query_select = $mysqli->query("SELECT password FROM `users` WHERE email = '".$email."'");

                if(!$result_query_select)
                {
                    // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/index.php");

                    //Останавливаем скрипт
                    exit();
                }

                else
                {

                //Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
                    if($result_query_select->num_rows == 1)
                    {

                        while ($row = $result_query_select->fetch_array())
                        {
                            $hash = $row['password'];
                        }

                        if (password_verify($password, $hash))
                        {

                        // Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;

                        //Возвращаем пользователя на главную страницу
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."/lk.php");
                        }

                        else
                        {
                               // Сохраняем в сессию сообщение об ошибке.
                            $_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин/пароль!</p>";

                            //Возвращаем пользователя на страницу регистрации
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."/form_auth.php");

                            //Останавливаем скрипт
                            exit();
                        }

                    }

                }
                $result_query_select->close();

            }

            else
            {
                    // Сохраняем в сессию сообщение об ошибке.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Ваш пароль</p>";

                    //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/index.php");

                    //Останавливаем скрипт
                exit();
            }

        }
        else
        {
                // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода пароля</p>";

                //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/index.php");

                //Останавливаем скрипт
            exit();
        }
    }
    else
    {
        exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    }