<?php
require "assets/config.php";
// Insert Header
include "header.php";


if (isset($_POST["sendmail"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	$to = "contact@32avzir6unmcg2y2.onion";
	$subject = "Message from: 32avzir6unmcg2y2.onion";
	$headers = "From: contact@32avzir6unmcg2y2.onion";
	$txt = "You have new message from site 32avzir6unmcg2y2.onion\nContact name: " . $name . "\nEmail: " . $email . "\nMessage: " . $message;

	mail($to,$subject,$txt, $headers);

	$success =  "<p class='text-success'>Ваше сообщение отправлено.</p>";
}


?>
			
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
						  <li><a href="index.php">Популярные признания</a></li>
						  <li class="active">Контакты</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-success wow fadeIn" data-wow-duration="3s">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Контакты</h3>
						  	</div>
							<div class="panel-body">
							  	 <div class="col-sm-4">
							  	 	<legend>Info:</legend>
								    <p>Для получения информации о этом сайте и условиях размещения рекламы, пожалуйста, заполните форму обратной связи.
								</div>
							  	<div class="col-sm-8">
							  	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
								    <legend>Форма обратной связи:</legend>
		
									<div class="form-group">
										<label>Ваше имя:</label>
										<input name="name" id="name" class="form-control" rows="3" required="required"></input>
									</div>
									<div class="form-group">
										<label>E-mail:</label>
										<input name="email" id="email" class="form-control" rows="3" required="required"></input>
									</div>
									<div class="form-group">
										<label>Ваше сообщение:</label>
										<textarea name="message" id="message" class="form-control" rows="3" required="required"></textarea>
									</div>
									<button type="submit" name="sendmail" class="btn btn-primary pull-right">Свяжитесь с нами</button>
									<?php $success ?>
							    </form>
							    </div> 
							</div>
						</div>
					</div>
				</div>


<?php include "footer.php"; ?>