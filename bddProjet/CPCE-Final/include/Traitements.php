<?php
					
					
					include 'connexionBD.php';

					// Si nous sommes bien connecté
					if ($bdd == true) {

						// Traitement VIDEO_LIVE

						$req = $bdd->prepare('SELECT * FROM video_live WHERE id_video_live = ?');
						$req->execute(array(1));
						$userinfo = $req->fetch();

						if (isset($_POST["Ajouter_Video_Live"])) {

							if (!empty($_POST["Url"]) || !empty($_POST["Titre"]) || !empty($_POST["desc"])) {

								if($_POST['Num_Video_Live'] == $userinfo['id_video_live']) {

									echo "Erreur, l'entrée choisi existe déjà !";
								}
								else
								{

									$query = $bdd->prepare("INSERT INTO video_live (id_video_live, url_video_live, url_modif, titre_video_live, description_video_live, id_utilisateur) values (:id_video_live, :url_video_live, :url_modif, :titre_video_live, :description_video_live, :id_utilisateur)");
									$query->bindParam(':id_video_live' , $numVideo);
									$query->bindParam(':url_video_live' , $url);
									$query->bindParam(':url_modif' , $url2);
									$query->bindParam(':titre_video_live' , $titre);
									$query->bindParam(':description_video_live' , $desc);
									$query->bindParam(':id_utilisateur' , $id);

									$numVideo = $_POST['Num_Video_Live'];
									$url = $_POST["Url"];
									$url2 = preg_replace('#watch\?v=#isU', 'embed/', $url);
									$titre = $_POST["Titre"];
									$desc = $_POST["desc"];
									$id = $_GET['id'];
									// Exécution de la requête 
									$query->execute();
								}
							}
							else
							{
								echo 'Veuilez compléter les champs vides';
							}
						}

						//Traitement TEXTE_ACCUEIL

						$reqtextacc = $bdd->prepare('SELECT * FROM texte_accueil WHERE id_texte_accueil = ?');
						$reqtextacc->execute(array(1));
						$userinfotextacc = $reqtextacc->fetch();

						// Vérification de l'existence des valeurs du formulaire
						if (isset($_POST["Ajouter_Texte_Accueil"])) {

							if (!empty($_POST["Texte_num_accueil"]) || !empty($_POST["contenu_accueil"])) {

								if($_POST['Texte_num_accueil'] != $userinfotextacc['id_texte_accueil']) {

									if($_POST['Texte_num_accueil'] <= 3) {

										$query = $bdd->prepare("INSERT INTO texte_accueil (id_texte_accueil, contenu_texte_accueil, ID_utilisateur) values (:id_texte ,:contenu_texte, :id_utilisateur)");
										$query->bindParam(':id_texte' , $id_texte_accueil);
										$query->bindParam(':contenu_texte' , $contenu_accueil);
										$query->bindParam(':id_utilisateur', $id_utilisateur);
										// Récuperation des valeurs du formulaire
										$id_texte_accueil = $_POST['Texte_num_accueil'];
										$contenu_accueil = $_POST["contenu_accueil"];
										$id_utilisateur = $_SESSION['id_utilisateur'];
										// Exécution de la requête 
										$query->execute();
									}
									else
									{
										echo 'Vous ne pouvez inserer que 3 textes !';
									}
								}
								else
								{
									echo "Erreur, l'entrée choisi existe déjà !";
								}
							}
							else
							{
								echo 'Veuilez compléter les champs vides';
							}
						}

						//Traitement TEXTE_PROGRAMME

						$reqtextprog = $bdd->prepare('SELECT * FROM texte_programme WHERE id_texte_programme = ?');
						$reqtextprog->execute(array(1));
						$userinfotextprog = $reqtextprog->fetch();

						if (isset($_POST["Ajouter_Texte_Programme"])) {

							if (!empty($_POST["Texte_num_programme"]) || !empty($_POST["Titre_texte_programme"]) || !empty($_POST["contenu_programme"])) {

								if($_POST['Texte_num_programme'] != $userinfotextprog['id_texte_programme']) {

									if($_POST['Texte_num_programme'] <= 3) {


										$query = $bdd->prepare("INSERT INTO texte_programme (id_texte_programme, titre_texte_programme, contenu_texte_programme, id_utilisateur) values (:id_texte , :titre_texte, :contenu_texte, :id_utilisateur)");
										$query->bindParam(':id_texte' , $id_texte_programme);
										$query->bindParam(':titre_texte' , $titre_programme);
										$query->bindParam(':contenu_texte' , $contenu_programme);
										$query->bindParam(':id_utilisateur', $id_utilisateur);
										// Récuperation des valeurs du formulaire
										$id_texte_programme = $_POST['Texte_num_programme'];
										$titre_programme = $_POST['Titre_texte_programme'];
										$contenu_programme = $_POST["contenu_programme"];
										$id_utilisateur = $_SESSION['id_utilisateur'];
										// Exécution de la requête 
										$query->execute();
									}
									else
									{
										echo 'Vous ne pouvez inserer que 3 textes !';
									}
								}
								else
								{
									echo "Erreur, l'entrée choisi existe déjà !";
								}
							}
							else
							{
								echo 'Veuilez compléter les champs vides';
							}
						}


						//Traitement IMAGE_PROGRAMME

						$reqimageprog = $bdd->prepare('SELECT * FROM image_programme WHERE id_image_programme = ?');
						$reqimageprog->execute(array(1));
						$userinfoimageprog = $reqimageprog->fetch();

						if (isset($_POST["Ajouter_Image_Programme"])) {

							if (!empty($_POST["Image_num_programme"]) || !empty($_POST["Url_image_programme"])) {

								if($_POST['Image_num_programme'] != $userinfoimageprog['id_image_programme']) {

									if($_POST['Image_num_programme'] <= 3) {


										$query = $bdd->prepare("INSERT INTO image_programme (id_image_programme, url_image_programme, id_utilisateur) values (:id_image , :url_image, :id_utilisateur)");
										$query->bindParam(':id_image' , $id_image_programme);
										$query->bindParam(':url_image' , $image_programme);
										$query->bindParam(':id_utilisateur', $id_utilisateur);
										// Récuperation des valeurs du formulaire
										$id_image_programme = $_POST['Image_num_programme'];
										$image_programme = $_POST['Url_image_programme'];
										$id_utilisateur = $_SESSION['id_utilisateur'];
										// Exécution de la requête 
										$query->execute();
									}
									else
									{
										echo 'Vous ne pouvez inserer que 3 images !';
									}
								}
								else
								{
									echo "Erreur, l'entrée choisi existe déjà !";
								}
							}
							else
							{
								echo 'Veuilez compléter les champs vides';
							}
						}


					}
					elseif ($bdd == false) {
						echo "Echec de connexion à la base de données";
					}
?>