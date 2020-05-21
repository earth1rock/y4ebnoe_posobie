<?php
    //Подключение шапки
require_once("header.php");
?>
<div class="content d-flex flex-column justify-content-center">
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

<?php
if(!isset($_SESSION["email"]) && !isset($_SESSION["password"]))
{
	?>

			<div class="marg" style="padding-top: 15px; padding-bottom: 15px; width: 270px;">
				<h1>Авторизация</h1>


				<form method="POST" name="form_auth" action="auth.php">

					<div class="form-group">
						<label for="exampleInputEmail1">E-mail</label>
						<input type="email" name="authemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="required">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="authpassword" class="form-control" id="exampleInputPassword1" required="required">
					</div>

						<button type="reset" class="btn btn-secondary">Очистить</button>

						<button type="submit" class="btn btn-primary" name="btn_submit_auth" value="btn_submit_auth">Авторизоваться</button>

				</form>
			</div>
		</div>

<?php
}

else {
	$_SESSION["error_messages"] .= "<p class='mesage_error' >Вы уже авторизованы!</p>";
}
?>

<?php
    //Подключение подвала
require_once("footer.php");
?>