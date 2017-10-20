<?php 
session_start();

include 'connexionBD.php';


	$getid = $_GET['id'];
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE password_utilisateur = ?');
	$req->execute(array($getid));
	$userinfo = $req->fetch();
	$_SESSION['password_utilisateur'] = $userinfo['password_utilisateur'];

if(isset($_GET['id']) AND $_GET['id'] == $_SESSION['password_utilisateur'])
{

?>

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
			<li><a href="<?php echo "Texte_accueil.php?id=".$_SESSION['password_utilisateur'];"" ?>">Textes-Accueil</a></li>
			<li><a href="<?php echo "Texte_programme.php?id=".$_SESSION['password_utilisateur'];"" ?>">Textes/Images-Programme</a></li>
			<li><a href="<?php echo "retourBackOffice.php?id=".$_SESSION['password_utilisateur'];"" ?>">Photo témoignage</a></li>
			<li><a href="<?php echo "liveBO.php?id=".$_SESSION['password_utilisateur'];"" ?>">Video</a></li>
		</ul>
	<div style="clear: both; "></div>
	</div>
	<div class="container">
		<h3> Bienvenue <?php echo $userinfo['login_utilisateur']; ?></h3>
		<a href="deconnexion.php">Se déconnecter</a>
	</div>
</body>
</html>
<?php
}
else
{
	header("Location: login.php");
}
?>
