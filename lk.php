<?php

//Добавляем файл подключения к БД
require_once("dbconnect.php");

    //Подключение шапки
require_once("header.php");



$result_query_select = $mysqli->query("SELECT * FROM `users` WHERE email = '".$_SESSION["email"]."'");

if($result_query_select)
                    {

                        while ($row = $result_query_select->fetch_array())
                        {
                            $first_name = $row['first_name'];
                            $middle_name = $row['middle_name'];
                            $last_name = $row['last_name'];
                            $role = $row['role'];
                        }

                    }

?>

<div class="content">
	<?php
	//если пользователь не авторизован, то перенаправляем на страницу авторизации
		if(!isset($_SESSION["email"]) && !isset($_SESSION["password"]))
		{
	?>
			<p>Ti ne zawel v li4nii kabinet!</p>

	<?php
		}
	//если авторизован, то выводим данные о пользователе
		else {
	?>

	<div class="d-flex justify-content-center">
		<div >
			<h1>Личный кабинет</h1>
			<br>
			<br>
		</div>
	</div>

	<div class="profile">

	<ul class="lk_list">
    	<li>Фамилия: <?php echo $last_name; ?> </li>
    	<li>Имя: <?php echo $first_name; ?></li>
    	<li>Отчество: <?php echo $middle_name; ?></li>
    	<li>Должность: <?php echo $role; ?></li>
    </ul>


	</div>

	<?php
		}
	?>



</div>

	<?php
    //Подключение подвала
	require_once("footer.php");
	?>


