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
	include 'connexionBD.php';
?>
	
	<div class="container">
		<h3> Se connecter </h3>
		
		<?php 


		if(isset($_POST['formconnexion'])) 
		{
			if(!empty($_POST['username']) AND !empty($_POST['password']))
			{
				$mdp = sha1($_POST['password']);
				$req = $bdd->prepare('SELECT * FROM utilisateur WHERE login_utilisateur = ? AND password_utilisateur = ?');
				$req->execute(array($_POST['username'], $mdp));

				if($req->rowCount() == 1) {
					
					$userinfo = $req->fetch();
					$_SESSION['id_utilisateur'] = $userinfo['id_utilisateur'];
					$_SESSION['password_utilisateur'] = $userinfo['password_utilisateur'];
					$_SESSION['login_utilisateur'] = $userinfo['login_utilisateur'];
					header("Location: Accueil_Backoffice.php?id=".$_SESSION['password_utilisateur']);
	
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

		<a href="../accueil.php">retour</a>
	
</body>
</html>