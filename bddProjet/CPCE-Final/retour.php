<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="include/style.css">
		<title>Page retour</title>
	</head>
	<body>
		<?php
				include "/include/connexionBD.php";
				include "/include/header.php";

				//Requete qui recupère les photos
				$req = $bdd->prepare("SELECT url_photo_temoignage, description_photo_temoignage FROM photo_temoignage" );
				$req->execute();
				//On met les photo dans une variable images
				$images = $req->fetchAll();
				//Requete qui compte le nombre de photo dans la base de donné
				$reqCnt = $bdd->prepare("SELECT COUNT(*) FROM photo_temoignage");
				$reqCnt->execute();
				$nbPhoto = $reqCnt->fetch();
				//On récupère le nombre de photo qui se suit dans un tableau.
				$nb = $nbPhoto[0];
				$compteur = 0;

			?>
			<!--Div centrale-->
			<div id="">
				<?php
					// On récupère les photos dans un tableau
					foreach ($images as $image[]) {
					}
					// On cherche un photo avec une description Centre pour la placé au centre. L'utilisateur est doit obligatoirement mettre Centre en description.
					while ($compteur < $nb) 
					{
						if ($image[$compteur]['description_photo_temoignage'] == "Centre") 
						{
							echo '<img class="" src="'.$image[$compteur]['url_photo_temoignage'].'">';
							$compteur = $nb + 1 ;
						}
						else
						{
							$compteur++;
						}
					}
					$compteur = 0;
				?>
			</div>
			<!-- Div de Gauche-->
			<div id="">
					<?php
						while ($compteur < $nb && $compteur != 4) 
						{
							if ($compteur < 4 && $image[$compteur]['description_photo_temoignage'] != "Centre" ) 
							{
								echo '<img class="" src="'.$image[$compteur]['url_photo_temoignage'].'">';
								$compteur++;
							}
						}
					?>
			</div>		 
			<!--Div de Droite-->
			<div id="">
						<?php
							while ($compteur < $nb && $compteur !=8) 
							{
								if ( 4 <= $compteur && $compteur < 8 && $image[$compteur]['description_photo_temoignage'] != "Centre") 
								{
									echo '<img class="" src="'.$image[$compteur]['url_photo_temoignage'].'">';
									$compteur++;
								}
							}
						?>
			</div>
			<!--Div du Bas-->
			<div id="">
				<?php
					while ($compteur < $nb && $compteur !=11) 
					{
						if ( 8 <= $compteur && $compteur < 11 && $image[$compteur]['description_photo_temoignage'] != "Centre") 
						{
							echo '<img class="" src="'.$image[$compteur]['url_photo_temoignage'].'">';
							$compteur++;
						}
					}
				?>
			</div>
			<!--Galerie de photo (photo supplémentaire)-->
			<div id="">
				<?php
					while ($compteur < $nb) 
					{
						if ( 8 <= $compteur && $image[$compteur]['description_photo_temoignage'] != "Centre") 
						{
							echo '<img class="" src="'.$image[$compteur]['url_photo_temoignage'].'">';
							$compteur++;
						}
					}
				?>
			</div>

			<?php include "/include/footer.php"; ?>
	</body>
</html>