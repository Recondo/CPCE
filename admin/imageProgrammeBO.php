<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Live</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
	</head>
	<body>

	<?php
		include 'Traitements.php'; 
		include 'bdd.php';


	if(isset($_GET['id']) AND $_GET['id'] > 0)
	{
	$getid = intval($_GET['id']);
	$req = $db->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur = ?');
	$req->execute(array($getid));
	$userinfo = $req->fetch();
	?>

				<h3>Ajouter un texte</h3>
				<br>
				<form method="post" name="LiveBO">				
				Image n° : <input type="text" class="Num_image_programme" name="Num_image_programme">
				<br> <br>
				Url : <input type="text" class="Url_image_programme" name="Url_image_programme">
				<br> <br>
				<input type="submit" class="Ajouter_img_prog" name="Ajouter_img_prog">
				</form>

				<h3>Liste des textes</h3>
				<br>
				<?php 
					          
					$query = $db->prepare('SELECT id_image_programme, url_image_programme FROM image_programme');
					          
					$query->execute();
					$images = $query->fetchAll();
				?>

				<table border class="tabVid">
					<thead>
						<tr>
							<th>Image n°</th>
							<th>Url</th>
							<th>Action</th>
						</tr>
					</thead>		
					<?php
					foreach ($images as $image)
					{
					?>
					<tbody>
						<tr>
							<td>
								<?php echo $image['id_image_programme']; ?>
							</td>
							<td>
								<?php echo $image['url_image_programme']; ?>
							</td>
							<td>
								<form name="supp" method="post">
								<input type="submit" name="suppression" value="Supprimer">
								<?php
									echo "<input type='hidden' name='id' value='".$image['id_image_programme']."'>";
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
                               //On récupére Id_date_annee pour suppresion en BDD
                               $id = $_POST['id'];
                               //Exécution de la requete de suppression
							   $query = $db->prepare("DELETE FROM image_programme where id_image_programme = '$id'");
							   $query->execute();
                               ?>
                               <script>
									window.location.href ='imageProgrammeBO.php?id=".$_SESSION['id_utilisateur']/';
                               </script>
                               <?php
                					}
								?>		


	</body>
</html>
<?php	
	}
	else
	{
		header("Location: login.php");
	}
?>