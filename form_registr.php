<?php
    //Подключение шапки
require_once("header.php");
?>

<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>

<div class="content d-flex justify-content-center">

	<div class="d-flex flex-column justify-content-center" style="padding-top: 15px; width: 270px;">
		<div>
			<h1>Регистрация</h1>
		</div>
		<form method="POST" name="form_registr" action="register.php">

			<div class="form-group">
				<label for="inputFName">Имя*</label>
				<input type="text" class="form-control" name="first_name" id="inputFName" required="required">
			</div>
			<div class="form-group">
				<label for="inputSName">Фамилия*</label>
				<input type="text" class="form-control" name="last_name" id="inputSName" required="required">
			</div>
			<div class="form-group">
				<label for="inputMName">Отчество</label>
				<input type="text" class="form-control" name="middle_name" id="inputMName">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email*</label>
				<input type="email" name="email" class="form-control" id="inputRegEmail" required="required">
				<span id="valid_email_message" class="msg_error"></span>
			</div>
			<div class="form-group">
				<label for="inputRegPw">Пароль*</label>
				<input type="password" name="password" class="form-control" id="inputRegPw" required="required">
				<span id="valid_password_message" class="msg_error"></span>
			</div>
			<div class="form-group">
				<label for="inputRegPw2">Подтверждение пароля*</label>
				<input type="password" name="password2" class="form-control" id="inputRegPw2" required="required">
				<span id="checkPw" class="msg_error"></span>
			</div>
			<input type="submit" class="btn btn-primary btn-block" name="btn_submit_register" style="margin-bottom: 15px;">
		</form>
	</div>
</div>
<?php
    //Подключение подвала
require_once("footer.php");
?>