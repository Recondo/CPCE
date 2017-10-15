<?php session_start() ?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php include('Header.php');
		  require_once 'admin/bdd.php'; ?>


	<?php 
		$req = $db->query('SELECT * FROM texte');

		$textes = $req->fetchAll();

		foreach ($textes as $texte): ?>


	<?php	endforeach ?>
	

<div class="blocProg">
	<div class="bloc1">
		<img src="img/groupe.jpg">
		<div class="text">
			<h2><?= $texte['titre_texte']?></h2>
			<p><?= $texte['contenu_texte']?></p>
		</div>
	</div>
	<div class="bloc2">
		<img src="img/groupe.jpg">
		<div class="text">
			<h2><?= $texte['titre_texte']?></h2>
			<p><?= $texte['contenu_texte']?></p>
		</div>
	</div>
	<div class="bloc3">	
		<img src="img/groupe.jpg">
		<div class="text">
			<h2><?= $texte['titre_texte']?></h2>
			<p><?= $texte['contenu_texte']?></p>
		</div>
	</div>
</div>
<?php include('footer.php') ?>
</body>
</html>