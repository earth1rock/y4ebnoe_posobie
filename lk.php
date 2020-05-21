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
<?php
	//если пользователь не авторизован, то перенаправляем на страницу авторизации
		if(!isset($_SESSION["email"]) && !isset($_SESSION["password"]))
		{
	?>
<div class="content row align-items-center">

		<div class="col mesage_error block_for_messages"><p>Вы не авторизованы!</p> </div>
	<?php
		}
	//если авторизован, то выводим данные о пользователе
		else {
	?>
	<div class="content">
	<div class="d-flex justify-content-center">
		<div>
			<h1>Личный кабинет</h1>
			<br>
			<br>
		</div>
	</div>

	<div>
	<ul class="lk_list ">
		<li class="text-center"><div class="avatar rounded-circle bg-primary "><p style="padding-top: 10px"><?php echo substr($first_name, 0, 2); ?></p></div></li>
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


