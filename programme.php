<?php session_start() ?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php include 'view/include/Header.php';
		  include 'view/include/connexionBD.php'; ?>


	<?php 
		//requête pour les textes
		$reqtexte = $bdd->query('SELECT * FROM texte_programme WHERE id_texte_programme = 1');
		$reqtexte2 = $bdd->query('SELECT * FROM texte_programme WHERE id_texte_programme = 2');
		$reqtexte3 = $bdd->query('SELECT * FROM texte_programme WHERE id_texte_programme = 3');

		$donneetexte = $reqtexte->fetch();
		$donneestexte2 = $reqtexte2->fetch();
		$donneestexte3 = $reqtexte3->fetch();

		//requête pour les images

		$reqimage = $bdd->query('SELECT * FROM image_programme WHERE id_image_programme = 1');
		$reqimage2 = $bdd->query('SELECT * FROM image_programme WHERE id_image_programme = 2');
		$reqimage3 = $bdd->query('SELECT * FROM image_programme WHERE id_image_programme = 3');

		$donneesimage = $reqimage->fetch();
		$donneesimage2 = $reqimage2->fetch();
		$donneesimage3 = $reqimage3->fetch();
		
	?>	

<div class="blocProg">
	<div class="bloc1">
		<img <?php if(!empty($donneesimage['url_image_programme'])){ ?> src="<?php echo $donneesimage['url_image_programme']; ?>" <?php } else { ?> alt ="<?php echo 'Veuillez inserer une image via le panel administratif !'; ?>" <?php } ?>>
		<div class="text">
			<h2>

			<?php 

			if(!empty($donneestexte['titre_texte_programme']))
			{
			echo $donneestexte['titre_texte_programme'];
			}
			else
			{
				echo 'Veuillez inserer un titre via le panel administratif !';
			}

			?>
				
			</h2>
			<p>

			<?php

			if(!empty($donneestexte['contenu_texte_programme'])){
			echo $donneestexte['contenu_texte_programme'];
			}
			else
			{
				echo 'Veuillez inserer un contenu via le panel administratif !';
			}

			?>
				
			</p>
		</div>
	</div>
	<div class="bloc2">
		<img <img <?php if(!empty($donneesimage2['url_image_programme'])){ ?> src="<?php echo $donneesimage2['url_image_programme']; ?>" <?php } else { ?> alt ="<?php echo 'Veuillez inserer une image via le panel administratif !'; ?>" <?php } ?>>
		<div class="text">
			<h2><?php 
			if(!empty($donneestexte2['titre_texte_programme']))
			{
			echo $donneestexte2['titre_texte_programme'];
			}
			else
			{
				echo 'Veuillez inserer un titre via le panel administratif !';
			}
			?>
			</h2>
			<p>
			<?php 
			if(!empty($donneestexte2['contenu_texte_programme'])){
			echo $donneestexte2['contenu_texte_programme'];
			}
			else
			{
				echo 'Veuillez inserer un contenu via le panel administratif !';
			}
			?>
			</p>
		</div>
	</div>
	<div class="bloc3">	
		<img <img <?php if(!empty($donneesimage3['url_image_programme'])){ ?> src="<?php echo $donneesimage3['url_image_programme']; ?>" <?php } else { ?> alt ="<?php echo 'Veuillez inserer une image via le panel administratif !'; ?>" <?php } ?>>
		<div class="text">
			<h2>

			<?php
			
			if(!empty($donneestexte3['titre_texte_programme']))
			{
			echo $donneestexte3['titre_texte_programme'];
			}
			else
			{
				echo 'Veuillez inserer un titre via le panel administratif !';
			}

			?>

			</h2>
			<p>

			<?php 

			if(!empty($donneestexte3['contenu_texte_programme'])){
			echo $donneestexte3['contenu_texte_programme'];
			}
			else
			{
				echo 'Veuillez inserer un contenu via le panel administratif !';
			}

			?>

			</p>
		</div>
	</div>
</div>
<?php 

include 'view/include/footer.php' ?>
</body>
</html>