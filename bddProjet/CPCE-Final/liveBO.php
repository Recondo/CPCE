<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Live</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
	</head>
	<body>

	<?php
		include '/liveTraitementBO.php'; 
		include '/connexionBD.php';
		include "./header.php";

	?>

				<h3>Ajouter une vidéo</h3>
				<br>
				<form method="post" name="LiveBO">				
				Url : <input type="text" class="Url" name="Url">
				<br> <br>
				Titre : <input type="text" class="Titre" name="Titre">
				<br> <br>
				Description : <textarea name="desc" cols="30" rows="5"></textarea>
				<br> <br>
				<input type="submit" class="Ajouter" name="Ajouter">
				</form>

				<h3>Liste des vidéos</h3>
				<br>
				<?php 
					          
					$query = $bdd->prepare('SELECT titre_video_live, description_video_live, id_video_live FROM video_live');
					          
					$query->execute();
					$results = $query->fetchAll();
				?>

				<table border class="tabVid">
					<thead>
						<tr>
							<th>Vidéo</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
					</thead>		
					<?php
					foreach ($results as $video)
					{
					?>
					<tbody>
						<tr>
							<td>
								<?php echo $video['titre_video_live']; ?>
							</td>
							<td>
								<?php echo $video['description_video_live']; ?>
							<td>
								<form name="supp" method="post">
								<input type="submit" name="suppression" value="Supprimer">
								<?php
									echo "<input type='hidden' name='id' value='".$video['id_video_live']."'>";
								?>
								</form>
							</td>
						</tr>				
					</tbody>	
						<?php
							}
						?>
				</table>

				<?php
                if(isset($_POST['suppression']))
                {
                               //On récupére Id_video pour suppresion en BDD
                               $id = $_POST['id'];
                               //Exécution de la requete de suppression
							   $query = $bdd->prepare("DELETE FROM video_live where id_video_live = '$id'");
							   $query->execute();
                               ?>
                               <script>
									window.location.href ='liveBO.php/';
                               </script>
                               <?php
                					}
								?>

			<a href="<?php echo "Accueil_Backoffice.php?id=".$_SESSION['password_utilisateur'];"" ?>">retour</a>		

			<?php include "./include/footer.php"; ?>
	</body>
</html>				