<?php
    //Подключение шапки
require_once("header.php");
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

			<p>Ti  zawel </p>

	<?php
		}
	?>



</div>

	<?php
    //Подключение подвала
	require_once("footer.php");
	?>


