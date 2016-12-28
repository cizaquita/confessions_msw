<?php
require "assets/config.php";
// Insert Header
include "header.php";

$unique_id = $_GET["pid"];

?>

				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
						  <li><a href="index.php">Популярные признания</a></li>
						  <li class="active">Sucess.</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="well well-lg">
							<h1>Успешно!</h1>
							<p>Вы только что опубликовали признание. Вы не получите уведомлений об этом, потому что это противоречит политике сайта и мы не используем Ваши личные данные.</p>
							<p>Если Вы хотите позже вернуться к своему признанию и просмотреть комментарии, просто введите номер Вашего признания в поисковое окно.</p>
							<h4>ID: <?php echo $unique_id; ?></h4>
							<p class="text-muted">Мы рекомендуем сохранить номер Вашего признания.</p>
						</div>
					</div>
				</div>


<?php include "footer.php"; ?>