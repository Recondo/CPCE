<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display" />
	<meta charset="UTF-8">
</head>
<body>
	<div class="head">
		<h2>Administration</h2>
		<ul>	
			<li><a href="Text.php">Text</a></li>
			<li><a href="Photo.php">Photo</a></li>
			<li><a href="Video.php">Video</a></li>
		</ul>
	<div style="clear: both; "></div>
	</div>
	<div class="container">
		<h3> Bienvenue <?php echo $userinfo['login_utilisateur']; ?></h3>
	</div>
</body>
</html>