				<?php

					//connexionBD.php
					$user = 'root';
					$passwd = '';
					$bdd = new PDO('mysql:host=localhost;dbname=projet1;charset=utf8', 'root', '');





					// Vérification de la connexion à la base de données
					// Si nous sommes bien connecté
					if ($bdd == true) {
						// Préparation de la requête SQL suivante : inserer l'année
						$query = $bdd->prepare("INSERT INTO video (url_video, titre_video, description_video) values (:url_video, :titre_video, :description_video)");
						$query->bindParam(':url_video' , $url);
						$query->bindParam(':titre_video' , $titre);
						$query->bindParam(':description_video' , $desc);

						// Vérification de l'existence des valeurs du formulaire
						if (isset($_POST["Ajouter"])) {
								// Récuperation des valeurs du formulaire
								$url = $_POST["Url"];
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
