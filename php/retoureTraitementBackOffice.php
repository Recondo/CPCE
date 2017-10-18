<?php
	include "connectionBase.php";
	if ($baseDeDonne == true) {
		$query = $baseDeDonne->prepare("INSERT INTO photo_temoignage (description_photo_temoignage, titre_photo_temoignage, url_photo_temoignage, id_utilisateur) values (:description_photo_temoignage, :titre_photo_temoignage, :url_photo_temoignage, :id_utilisateur)");
		$query->bindParam(":description_photo_temoignage", $description);
		$query->bindParam(":titre_photo_temoignage", $titre);
		$query->bindParam(":url_photo_temoignage", $url);
		$query->bindParam(":id_utilisateur", $idUs);

		if (isset($_POST["Ajout"])) {
			$description = $_POST["description"];
			$titre = $_POST["titre"];
			$url = $_POST["url"];
			$idUs = $_GET["id"];
			
			$query->execute();
		}

	}
	elseif ($baseDeDonne == false) {
		echo "Echec de la connection.";
	}
?>