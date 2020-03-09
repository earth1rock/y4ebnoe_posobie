<?php
    //Подключение шапки
require_once("header.php");
?>


<div class="content d-flex justify-content-center">

	<div class="d-flex flex-column justify-content-center" style="padding-top: 15px; width: 270px;">
		<div>
			<h1>Регистрация</h1>
		</div>
		<form>

			<div class="form-group">
				<label for="inputFName">Имя</label>
				<input type="email" class="form-control" id="inputFName" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="inputSName">Фамилия</label>
				<input type="email" class="form-control" id="inputSName" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="inputMName">Отчество</label>
				<input type="email" class="form-control" id="inputMName" aria-describedby="emailHelp">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" id="inputRegEmail" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="inputRegPw">Пароль</label>
				<input type="password" class="form-control" id="inputRegPw">
			</div>
			<div class="form-group">
				<label for="inputRegPw2">Подтверждение пароля</label>
				<input type="password" class="form-control" id="inputRegPw2">
			</div>
			<button type="submit" class="btn btn-primary btn-block" style="margin-bottom: 15px;">Регистрация</button>
		</form>
	</div>
</div>
<?php
    //Подключение подвала
require_once("footer.php");
?>