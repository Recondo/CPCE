<?php
		require_once 'bdd.php';
					
					if ($db == true) {

						// TRAITEMENT TEXTES PROGRAMME
						$query = $db->prepare("INSERT INTO texte_programme (id_texte_programme, titre_texte_programme, contenu_texte_programme, id_utilisateur) values (:id_texte_programme, :titre_texte_programme, :contenu_texte_programme, :id_utilisateur)");
						$query->bindParam(':id_texte_programme' , $num);
						$query->bindParam(':titre_texte_programme' , $titre);
						$query->bindParam(':contenu_texte_programme' , $contenu);
						$query->bindParam(':id_utilisateur' , $id);
						
						// Vérification de l'existence des valeurs du formulaire
						if (isset($_POST["Ajouter"])) {
								// Récuperation des valeurs du formulaire
								$num = $_POST["Num_texte_programme"];
								$titre = $_POST["Titre_texte_programme"];
								$contenu = $_POST["Contenu_texte_programme"];
								$id = $_GET['id'];
								
								// Exécution de la requête 
								$query->execute();
						}

						// TRAITEMENT IMAGE PROGRAMME
						$query = $db->prepare("INSERT INTO image_programme (id_image_programme, url_image_programme, id_utilisateur) values (:id_image_programme, :url_image_programme, :id_utilisateur)");
						$query->bindParam(':id_image_programme' , $num);
						$query->bindParam(':url_image_programme' , $url);
						$query->bindParam(':id_utilisateur' , $id);
						
						// Vérification de l'existence des valeurs du formulaire
						if (isset($_POST["Ajouter_img_prog"])) {
								// Récuperation des valeurs du formulaire
								$num = $_POST["Num_image_programme"];
								$url = $_POST["Url_image_programme"];
								$id = $_GET['id'];
								
								// Exécution de la requête 
								$query->execute();
						}		
					}
					elseif ($db == false) {
						echo "Echec de connexion à la base de données";
					}
				?>