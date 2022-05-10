-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 mai 2022 à 16:58
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `flipper`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterAdherent` (IN `p_prenom` VARCHAR(255), IN `p_nom` VARCHAR(255), IN `p_email` VARCHAR(255), IN `p_mdp` VARCHAR(255), IN `p_adresse` VARCHAR(255), IN `p_lien_web` VARCHAR(255), IN `p_bio` TEXT, IN `p_dateAdhesion` DATE, IN `p_dateNaissance` DATE)  begin
    declare p_id int(3);
    insert into Utilisateur values (null, p_prenom, p_nom, p_email, p_mdp, p_adresse, p_lien_web, p_bio, p_dateAdhesion);
    select id into p_id from Utilisateur 
    where prenom = p_prenom and nom =p_nom and email = p_email and mdp = p_mdp and adresse = p_adresse and lien_web = p_lien_web and bio = p_bio and dateAdhesion = p_dateAdhesion;
    insert into Adherent values (p_id, p_dateNaissance);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterPersonnePublique` (IN `p_prenom` VARCHAR(255), IN `p_nom` VARCHAR(255), IN `p_email` VARCHAR(255), IN `p_mdp` VARCHAR(255), IN `p_adresse` VARCHAR(255), IN `p_lien_web` VARCHAR(255), IN `p_bio` TEXT, IN `p_dateAdhesion` DATE, IN `p_dateDebutCarriere` DATE, IN `p_fonction` VARCHAR(50))  begin
    declare p_id int(3);
    insert into Utilisateur values (null, p_prenom, p_nom, p_email, p_mdp, p_adresse, p_lien_web, p_bio, p_dateAdhesion);
    select id into p_id from Utilisateur 
    where prenom = p_prenom and nom =p_nom and email = p_email and mdp = p_mdp and adresse = p_adresse and lien_web = p_lien_web and bio = p_bio and dateAdhesion = p_dateAdhesion;
    insert into personne_publique values (p_id, p_dateDebutCarriere, p_fonction);
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `dateNaissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id`, `dateNaissance`) VALUES
(1, '2000-10-12'),
(2, '1999-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_user` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `id_event` int(11) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `dateheure`
--

CREATE TABLE `dateheure` (
  `dateHeure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` varchar(50) DEFAULT NULL,
  `dateCreationEvent` date DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `follower`
--

CREATE TABLE `follower` (
  `id_dest` int(11) NOT NULL,
  `id_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_exp` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `contenu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `personne_publique`
--

CREATE TABLE `personne_publique` (
  `id` int(11) NOT NULL,
  `dateDebutCarriere` date DEFAULT NULL,
  `fonction` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `lien_web` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `dateAdhesion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `prenom`, `nom`, `email`, `mdp`, `adresse`, `tel`, `lien_web`, `bio`, `avatar`, `dateAdhesion`) VALUES
(1, 'David', 'Delacroix', 'david@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', 'Avenue Jean Jaures', '0987654321', NULL, 'Je suis d\'humeur massacreuse', '1.jpg', '2022-05-02'),
(2, 'Paul', 'Petit', 'paul@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', '8 rue ici', 'paul', 'Je sais pas', 'Je sais pas', '', '2022-05-09'),
(3, 'Marc', 'Dutroux', 'patoche@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', 'Rue de rien du tout', '0789986754', 'NULL', 'Je ne sais pas', '18066.jpg', '2022-05-03'),
(4, 'Marc', 'Dutroux', 'Marc@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', 'rue jean moulin', '0654367234', 'NULL', 'Je ne sais pas quoi ecrire', '', '2022-05-10'),
(5, 'Jean', 'Jaures', 'jean@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', 'avenue marc dorcel', '0678543217', 'NULL', 'J&#039;en ai marre', 'NULL', '2022-05-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_user`,`dateHeure`,`id_event`),
  ADD KEY `dateHeure` (`dateHeure`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `dateheure`
--
ALTER TABLE `dateheure`
  ADD PRIMARY KEY (`dateHeure`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`id_dest`,`id_exp`),
  ADD KEY `id_exp` (`id_exp`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_exp`,`id_dest`,`dateHeure`),
  ADD KEY `id_dest` (`id_dest`),
  ADD KEY `dateHeure` (`dateHeure`);

--
-- Index pour la table `personne_publique`
--
ALTER TABLE `personne_publique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`dateHeure`) REFERENCES `dateheure` (`dateHeure`),
  ADD CONSTRAINT `commentaire_ibfk_3` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `follower`
--
ALTER TABLE `follower`
  ADD CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`id_dest`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `follower_ibfk_2` FOREIGN KEY (`id_exp`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_exp`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_dest`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`dateHeure`) REFERENCES `dateheure` (`dateHeure`);

--
-- Contraintes pour la table `personne_publique`
--
ALTER TABLE `personne_publique`
  ADD CONSTRAINT `personne_publique_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
