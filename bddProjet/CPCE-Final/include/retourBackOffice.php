<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Retour Back Office</title>
</head>
<body>
	<?php
		include "connexionBD.php";
		include "retoureTraitementBackOffice.php";

	$getid = $_GET['id'];
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE password_utilisateur = ?');
	$req->execute(array($getid));
	$userinfo = $req->fetch();
	$_SESSION['password_utilisateur'] = $userinfo['password_utilisateur'];

if(isset($_GET['id']) AND $_GET['id'] == $_SESSION['password_utilisateur'])
{
	?>
	<h1>Ajouter photo</h1>
	<p>Pour afficher la photo centrale, Veuillez mettre "Centre" en description.<br>
	</p>
	<form method="post" name="ajoutPhoto">
		<input type="text" name="titre" placeholder="Titre de votre photo.">
		<input type="text" name="url" placeholder="Placez votre URL.">
		<input type="text" name="description" placeholder="Votre description.">
		<input type="submit" name="Ajout" value="Ajouter" class="bt_ajoute">
	</form>
	<h1>Liste des photos</h1>
	<?php
		$query = $bdd->prepare("SELECT titre_photo, description_photo_temoignage, id_photo_temoignage FROM photo_temoignage");
		$query->execute();
		$resultat = $query->fetchAll();
	?>
	<table id="tablePhoto">
		<thead>
			<tr>
				<th>Photo</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php
			foreach ($resultat as $photo) {
		?>
		<tbody>
		<tr>
			<td>
				<?php echo $photo["titre_photo"];?>
			</td>
			<td>
				<?php echo $photo["description_photo_temoignage"];?>
			</td>
			<td>
				<form method="post" name="sup">
					<input type="submit" name="supprime" value="Supprimer">
					<?php 
						echo "<input type='hidden' name='id' value='".$photo['id_photo_temoignage']."'>";
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
		if (isset($_POST["supprime"])) {
			$id = $_POST["id"];
			$query = $baseDeDonne->prepare("DELETE FROM photo_temoignage where id_photo_temoignage = '$id'");
			$query->execute();
	?>
		<script type="text/javascript">
			window.location.href = "retourBackOffice.php?id=".$_SESSION['id_utilisateur']."";
		</script>
	<?php
		}

}
	?>

	<a href="<?php echo "Accueil_Backoffice.php?id=".$_SESSION['password_utilisateur'];"" ?>">retour</a>
</body>
</html>