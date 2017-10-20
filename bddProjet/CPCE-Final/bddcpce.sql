-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Octobre 2017 à 13:08
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddcpce`
--

-- --------------------------------------------------------

--
-- Structure de la table `image_programme`
--

CREATE TABLE `image_programme` (
  `id_image_programme` int(11) NOT NULL,
  `url_image_programme` varchar(50) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photo_temoignage`
--

CREATE TABLE `photo_temoignage` (
  `id_photo_temoignage` int(11) NOT NULL,
  `url_photo_temoignage` varchar(50) DEFAULT NULL,
  `titre_photo` varchar(50) NOT NULL,
  `description_photo_temoignage` varchar(50) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `texte_accueil`
--

CREATE TABLE `texte_accueil` (
  `id_texte_accueil` int(11) NOT NULL,
  `contenu_texte_accueil` varchar(255) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `texte_programme`
--

CREATE TABLE `texte_programme` (
  `id_texte_programme` int(11) NOT NULL,
  `titre_texte_programme` varchar(50) DEFAULT NULL,
  `contenu_texte_programme` varchar(255) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `login_utilisateur` varchar(50) NOT NULL,
  `password_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login_utilisateur`, `password_utilisateur`, `mail_utilisateur`) VALUES
(1, 'admin', 'root', 'k');

-- --------------------------------------------------------

--
-- Structure de la table `video_live`
--

CREATE TABLE `video_live` (
  `id_video_live` int(11) NOT NULL,
  `url_video_live` varchar(50) DEFAULT NULL,
  `url_modif` varchar(50) DEFAULT NULL,
  `titre_video_live` varchar(50) NOT NULL,
  `description_video_live` varchar(255) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `video_live`
--

INSERT INTO `video_live` (`id_video_live`, `url_video_live`, `url_modif`, `titre_video_live`, `description_video_live`, `id_utilisateur`) VALUES
(1, 'https://www.youtube.com/watch?v=gPv1EoaO0Sk', 'https://www.youtube.com/embed/gPv1EoaO0Sk', 'Test', 'test', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `image_programme`
--
ALTER TABLE `image_programme`
  ADD PRIMARY KEY (`id_image_programme`),
  ADD KEY `FK_image_programme_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `photo_temoignage`
--
ALTER TABLE `photo_temoignage`
  ADD PRIMARY KEY (`id_photo_temoignage`),
  ADD KEY `FK_photo_temoignage_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `texte_accueil`
--
ALTER TABLE `texte_accueil`
  ADD PRIMARY KEY (`id_texte_accueil`),
  ADD KEY `FK_texte_accueil_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `texte_programme`
--
ALTER TABLE `texte_programme`
  ADD PRIMARY KEY (`id_texte_programme`),
  ADD KEY `FK_texte_programme_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `video_live`
--
ALTER TABLE `video_live`
  ADD PRIMARY KEY (`id_video_live`),
  ADD KEY `FK_video_live_id_utilisateur` (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `image_programme`
--
ALTER TABLE `image_programme`
  MODIFY `id_image_programme` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo_temoignage`
--
ALTER TABLE `photo_temoignage`
  MODIFY `id_photo_temoignage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `texte_accueil`
--
ALTER TABLE `texte_accueil`
  MODIFY `id_texte_accueil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `texte_programme`
--
ALTER TABLE `texte_programme`
  MODIFY `id_texte_programme` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `video_live`
--
ALTER TABLE `video_live`
  MODIFY `id_video_live` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `image_programme`
--
ALTER TABLE `image_programme`
  ADD CONSTRAINT `FK_image_programme_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `photo_temoignage`
--
ALTER TABLE `photo_temoignage`
  ADD CONSTRAINT `FK_photo_temoignage_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `texte_accueil`
--
ALTER TABLE `texte_accueil`
  ADD CONSTRAINT `FK_texte_accueil_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `texte_programme`
--
ALTER TABLE `texte_programme`
  ADD CONSTRAINT `FK_texte_programme_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `video_live`
--
ALTER TABLE `video_live`
  ADD CONSTRAINT `FK_video_live_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
