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

				<h3>Ajouter un texte dans la page accueil</h3>
				<br>
				<form method="post" name="Text-accueil">
				<br> <br>
				Texte n° : <input type="text" class="Texte_num_accueil" name="Texte_num_accueil">
				<br> <br>				
				Contenu : <textarea name="contenu_accueil" cols="30" rows="5"></textarea>
				<br> <br>
				<input type="submit" class="Ajouter" name="Ajouter_Texte_Accueil">
				</form>


				<h3>Liste des textes</h3>
				<br>
				<?php 
					          
					$query = $bdd->prepare('SELECT contenu_texte_accueil, id_texte_accueil FROM texte_accueil');
					          
					$query->execute();
					$textes = $query->fetchAll();
				?>

				<table border class="tabVid">
					<thead>
						<tr>
							<th>Texte n°</th>
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
								<?php echo $texte['id_texte_accueil'] ?>
							</td>
							<td>
								<?php echo $texte['contenu_texte_accueil']; ?>
							<td>
								<form name="supp" method="post">
								<input type="submit" name="suppression" value="Supprimer">
								<?php
									echo "<input type='hidden' name='id' value='".$texte['id_texte_accueil']."'>";
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
							   $query = $bdd->prepare("DELETE FROM texte_accueil where id_texte_accueil = '$id'");
							   $query->execute();

							   header("Location: Texte_accueil.php?id=".$_SESSION['ID_utilisateur']);
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