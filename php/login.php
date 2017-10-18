<?php session_start() ?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display" />
	<meta charset="UTF-8">
</head>
<body>

<?php 
	require_once 'connectionBase.php';
?>
	
	<div class="container">
		<h3> Se connecter </h3>
		
		<?php 
		if(isset($_POST['formconnexion'])) 
		{
			if(!empty($_POST['username']) AND !empty($_POST['password']))
			{
				$mdp = htmlspecialchars($_POST['password']);
				$req = $baseDeDonne->prepare('SELECT * FROM utilisateur WHERE login_utilisateur = ? AND password_utilisateur = ?');
				$req->execute(array($_POST['username'], $mdp));
				if($req->rowCount() == 1) {
					
					$userinfo = $req->fetch();
					$_SESSION['id_utilisateur'] = $userinfo['id_utilisateur'];
					$_SESSION['login_utilisateur'] = $userinfo['login_utilisateur'];
					header("Location: retourBackOffice.php?id=".$_SESSION['id_utilisateur']);
				}
				else
				{
					echo 'login ou mdp incorrect';
				}
			}
			else
			{
				echo('Tout les champs doivent être complétés');
			}
		}
			
		?>

		<form action='login.php' method="POST">
			<input type='text' name="username"/>
			<input type='password' name="password"/>
			<input type="submit" name="formconnexion"/>
		</form>
	
</body>
</html>