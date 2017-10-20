				<?php
					//connexionBD.php
					$user = 'root';
					$passwd = '';
					$bdd = new PDO('mysql:host=localhost;dbname=bddcpce;charset=utf8', 'root', '');


					// Vérification de la connexion à la base de données
					// Si nous sommes bien connecté
					if ($bdd == true) {
						// Préparation de la requête SQL suivante : inserer la vidéo
						$query = $bdd->prepare("INSERT INTO video_live (url_video_live, url_modif, titre_video_live, description_video_live, id_utilisateur) values (:url_video_live, :url_modif, :titre_video_live, :description_video_live, 1)");
						$query->bindParam(':url_video_live' , $url);
						$query->bindParam(':url_modif' , $url2);
						$query->bindParam(':titre_video_live' , $titre);
						$query->bindParam(':description_video_live' , $desc);
				

						// Vérification de l'existence des valeurs du formulaire
						if (isset($_POST["Ajouter"])) {
								// Récuperation des valeurs du formulaire
								$url = $_POST["Url"];
								$url2 = preg_replace('#watch\?v=#isU', 'embed/', $url);
								$titre = $_POST["Titre"];
								$desc = $_POST["desc"];
							

								// Exécution de la requête 
								$query->execute();
							}		
					}
					elseif ($bdd == false) {
						echo "Echec de connexion à la base de données";
					}
				?>

