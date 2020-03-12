<?php
    //Подключение шапки
require_once("header.php");
?>

<br>
<div class="content">

	<div class="aut">
		<div class="container-fluid">

				<div class="inf col-lg-6 ">
					<div class="btn-group">
  					<!-- Кнопка -->
  					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Выполнить</button>
  					<!-- Меню -->  
  					<div class="dropdown-menu">
    				<a class="dropdown-item" href="#">Действие 1</a>
    				<a class="dropdown-item" href="#">Действие 2</a>
    				<a class="dropdown-item" href="#">Действие 3</a>
    				<div class="dropdown-divider"></div>
    				<a class="dropdown-item" href="#">Действие 4</a>
  					</div>
				</div>
				</div>
				<br>
				<div class="Back col-lg-6">
					<input type="button" class="btn btn-info" value="Назад" onclick="location.href = 'stranichka_prepodavatel.php';">


				</div>
			</div>
			</div>

		</div>
	</div>

</div>

<?php
    //Подключение подвала
require_once("footer.php");
?>