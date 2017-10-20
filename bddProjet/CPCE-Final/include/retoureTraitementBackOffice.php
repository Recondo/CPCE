<?php
	include "connexionBD.php";
	if ($bdd == true) {
		$query = $bdd->prepare("INSERT INTO photo_temoignage (description_photo_temoignage, titre_photo, url_photo_temoignage, id_utilisateur) values (:description_photo_temoignage, :titre_photo, :url_photo_temoignage, 1)");
		$query->bindParam(":description_photo_temoignage", $description);
		$query->bindParam(":titre_photo", $titre);
		$query->bindParam(":url_photo_temoignage", $url);
		

		if (isset($_POST["Ajout"])) {
			$description = $_POST["description"];
			$titre = $_POST["titre"];
			$url = $_POST["url"];
			
			$query->execute();
		}

	}
	elseif ($bdd == false) {
		echo "Echec de la connection.";
	}
?>