<?php 
session_start();

include 'connexionBD.php';
include 'Traitements.php';


	$getid = $_GET['id'];
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE password_utilisateur = ?');
	$req->execute(array($getid));
	$userinfo = $req->fetch();
	$_SESSION['password_utilisateur'] = $userinfo['password_utilisateur'];

if(isset($_GET['id']) AND $_GET['id'] == $_SESSION['password_utilisateur'] AND $_GET['id'] != null)
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Live</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
	</head>
	<body>

	<?php
		
	?>

				<h3>Ajouter un texte dans la page programme</h3>
				<br>
				<form method="post" name="Text-programme">
				<br> <br>
				Texte n° : <input type="text" class="Texte_num_programme" name="Texte_num_programme">
				<br> <br>
				Titre : <input type="text" class="Titre_texte_programme" name="Titre_texte_programme">
				<br> <br>				
				Contenu : <textarea name="contenu_programme" cols="30" rows="5"></textarea>
				<br> <br>
				<input type="submit" class="Ajouter" name="Ajouter_Texte_Programme">
				</form>


				<h3>Liste des textes</h3>
				<br>
				<?php 
					          
					$query = $bdd->prepare('SELECT id_texte_programme, titre_texte_programme, contenu_texte_programme FROM texte_programme');
					          
					$query->execute();
					$textes = $query->fetchAll();
				?>

				<table border class="tabVid">
					<thead>
						<tr>
							<th>Texte n°</th>
							<th>Titre</th>
							<th>Contenu</th>
							<th>Actions</th>
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
								<?php echo $texte['contenu_texte_programme']; ?>
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
							   $query = $bdd->prepare("DELETE FROM texte_programme where id_texte_programme = '$id'");
							   $query->execute();

							   header("Location: Texte_programme.php?id=".$_SESSION['password_utilisateur']);
                }
                ?>
                <br>

                <br>

                <h3>Ajouter une image dans la page programme</h3>
				<br>
				<form method="post" name="Text-programme">
				<br> <br>
				Image n° : <input type="text" class="Image_num_programme" name="Image_num_programme">
				<br> <br>
				Url : <input type="text" class="Url_image_programme" name="Url_image_programme">
				<br> <br>				
				<input type="submit" class="Ajouter" name="Ajouter_Image_Programme">
				</form>


				<h3>Liste des images</h3>
				<br>
				<?php 
					          
					$query = $bdd->prepare('SELECT id_image_programme, url_image_programme FROM image_programme');
					          
					$query->execute();
					$textes = $query->fetchAll();
				?>

				<table border class="tabVid">
					<thead>
						<tr>
							<th>Image n°</th>
							<th>Url</th>
							<th>Actions</th>
						</tr>
					</thead>		
					<?php
					foreach ($textes as $texte)
					{
					?>
					<tbody>
						<tr>															
							<td>
								<?php echo $texte['id_image_programme']; ?>
							</td>
							<td>
								<?php echo $texte['url_image_programme']; ?>
							</td>
							<td>
								<form name="supp" method="post">
								<input type="submit" name="suppression" value="Supprimer">
								<?php
									echo "<input type='hidden' name='id' value='".$texte['id_image_programme']."'>";
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
							   $query = $bdd->prepare("DELETE FROM image_programme where id_image_programme = '$id'");
							   $query->execute();

							   header("Location: Texte_programme.php?id=".$_SESSION['password_utilisateur']);
                }
                ?>
                               
                               	
<a href="<?php echo "Accueil_Backoffice.php?id=".$_SESSION['password_utilisateur'];"" ?>">retour</a>

	</body>
</html>			
<?php
}
else
{
	header("Location: login.php");
}
?>