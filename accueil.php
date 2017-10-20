<?php session_start() ?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display" />
	<meta charset="UTF-8">
</head>
<body>
<?php include 'view/include/connexionBD.php'; ?>
<?php include 'view/include/Header.php'; ?>
<?php include 'view/include/diapo.php'; ?>


<?php 
		$req = $bdd->prepare('SELECT * FROM texte_accueil WHERE id_texte_accueil = 1');
		$req->execute();

		$req1 = $bdd->prepare('SELECT * FROM texte_accueil WHERE id_texte_accueil = 2');
		$req1->execute();

		$req2 = $bdd->prepare('SELECT * FROM texte_accueil WHERE id_texte_accueil = 3');
		$req2->execute();
		

		$donnees = $req->fetch();
		$donnees1 = $req1->fetch();
		$donnees2 = $req2->fetch();
	
?>
	

	<div class="acctext">
		<p>

		<?php 

		if(!empty($donnees['contenu_texte_accueil']))
		{
			echo $donnees['contenu_texte_accueil'];
		}
		else
		{
			echo 'Veuillez inserer un contenu via le panel administratif !';
		}

		?>
			
		</p>

		<br>
    
		<p>


		<?php 

		if(!empty($donnees1['contenu_texte_accueil']))
		{
			echo $donnees1['contenu_texte_accueil'];
		}
		else
		{
			echo 'Veuillez inserer un contenu via le panel administratif !';
		}

		?>
			
		</p>

		<br>
    
		<p>

		<?php 

		if(!empty($donnees2['contenu_texte_accueil']))
		{
			echo $donnees2['contenu_texte_accueil'];
		}
		else
		{
			echo 'Veuillez inserer un contenu via le panel administratif !';
		}

		?>
			
		</p>
    </div>

<?php include "view/include/footer.php"; ?>
</body>
</html>