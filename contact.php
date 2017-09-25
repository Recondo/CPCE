<?php include('form.php'); ?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display" />
	</head>
	<body>
		<div class="fond-contact">
		
		<div class="style-form">
			<div class="ligneD"></div>
			<div class="ligneG"></div>
			<div class="cont-form">
				
				<h2>Envoyez-nous un Mail !</h2>
				
				<form method="POST" action="">
				
					<label for="nom">Votre nom :</label><input type="text" name="nom"  value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
					<label for="mail">Votre adresse email :</label><input type="email" name="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
					<label for="message">Votre message à faire passer :</label><textarea name="message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
					<input type="submit" value="Envoyer !" name="mailform"/>
				</form>
			</div>
		</div>
		</div>
		
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
	</body>
</html>