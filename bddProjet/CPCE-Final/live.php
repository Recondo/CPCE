<!DOCTYPE html>

<html lang="fr">
   
    <head>
        <meta charset="utf-8"/>
        <title>Construire ensemble</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" type="text/css" href="include/style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="./media/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">
    </head>

   	<body>
			<?php 
		include '/include/connexionBD.php';
	   	include "./include/header.php";

		$query = $bdd->prepare('SELECT * FROM video_live');
		$query->execute();

		?>




	<center>
		<h2>Live</h2>

<?php 
	if(isset($_GET['id']) AND $_GET['id'] > 0)
	{
	$getid = intval($_GET['id']);
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = ?');
	$req->execute(array($getid));
	$userinfo = $req->fetch();
?>

	
		<a href="http://localhost/PROJET1/liveBO.php">
  			 <input type="button" value="Ajouter/Supprimer" />
		</a>
<?php } ?>
	</center>


<br><br><br>
	
<div id="bloc1">
	<?php 
		while($video = $query->fetch())
		{
			?>
			<iframe width="300" height="200" src="<?php echo $video['url_modif'] ?>" frameborder="0" allowfullscreen></iframe>
		<?php	
		}	
		?>

		<?php include "./include/footer.php"; ?>
   	</body>
</html>