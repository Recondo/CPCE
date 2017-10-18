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
				Texte n° : <input type="text" class="Num_texte_programme" name="Num_texte_programme">
				<br> <br>
				Titre : <input type="text" class="Titre_texte_programme" name="Titre_texte_programme">
				<br> <br>
				Contenu : <textarea name="Contenu_texte_programme" cols="30" rows="5"></textarea>
				<br> <br>
				<input type="submit" class="Ajouter" name="Ajouter">
				</form>

				<h3>Liste des textes</h3>
				<br>
				<?php 
					          
					$query = $db->prepare('SELECT id_texte_programme, titre_texte_programme, contenu_texte_programme FROM texte_programme');
					          
					$query->execute();
					$textes = $query->fetchAll();
				?>

				<table border class="tabVid">
					<thead>
						<tr>
							<th>Texte n°</th>
							<th>Titre</th>
							<th>Contenu</th>
							<th>Action</th>
						</tr>
					</thead>		
					<?php
					foreach ($textes as $texte)
					{
					?>
					<tbody>
						<tr>
							<td>
								<?php echo $texte['id_texte_programme']; ?>
							</td>
							<td>
								<?php echo $texte['titre_texte_programme']; ?>
							</td>
							<td>
								<?php echo $texte['contenu_texte_programme'] ?>
							</td>
							<td>
								<form name="supp" method="post">
								<input type="submit" name="suppression" value="Supprimer">
								<?php
									echo "<input type='hidden' name='id' value='".$texte['id_texte_programme']."'>";
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
							   $query = $db->prepare("DELETE FROM texte_programme where id_texte_programme = '$id'");
							   $query->execute();
                               ?>
                               <script>
									window.location.href ='programmeBO.php?id=".$_SESSION['id_utilisateur']/';
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