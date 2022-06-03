DROP database flipper;
CREATE database flipper;
use flipper;

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `url_video` text DEFAULT NULL,
  `dateEvent` date NOT NULL,
  `dateCreationEvent` date DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `contenu`, `url_video`, `dateEvent`, `dateCreationEvent`, `id_user`) VALUES
(22, 'Jouer a la play', 'Salut comment ca va', '', '2000-10-12', '2022-06-03', 6),
(23, 'Sortir sur lyon', 'Bonjour qui veut sortir avec moi ', NULL, '2022-06-10', '2022-06-03', 6);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `events_users`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `events_users` (
`id` int(11)
,`titre` varchar(255)
,`contenu` text
,`url_video` text
,`dateEvent` date
,`dateCreationEvent` date
,`id_user` int(11)
,`nom` varchar(255)
,`prenom` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la table `follower`
--

CREATE TABLE `follower` (
  `id_followed` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `follower`
--

INSERT INTO `follower` (`id_followed`, `id_follower`) VALUES
(6, 7);

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
-- Structure de la table `interest`
--

CREATE TABLE `interest` (
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_exp` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL,
  `date_envoi` date NOT NULL,
  `contenu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_exp`, `id_dest`, `date_envoi`, `contenu`) VALUES
(1, 6, 7, '2022-05-25', 'Salut');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `messages_users`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `messages_users` (
`id` int(11)
,`id_exp` int(11)
,`id_dest` int(11)
,`date_envoi` date
,`contenu` varchar(255)
,`nomE` varchar(255)
,`prenomE` varchar(255)
,`nomR` varchar(255)
,`prenomR` varchar(255)
);

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
  `dateAdhesion` date DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `prenom`, `nom`, `email`, `mdp`, `adresse`, `tel`, `lien_web`, `bio`, `avatar`, `dateAdhesion`, `role`) VALUES
(6, 'Adrien', 'Delacroix', 'ad.dela75020@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', '8 Rue Ernest Lefèvre', '0674661495', 'NULL', 'Je ne sais pas quoi écrire', '500451.png', '2022-05-14', 0),
(7, 'Paul', 'Petit', 'paul@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', 'Rue de la rien du tout', '0987654321', 'NULL', 'Je ne sais pas quoi écrire', '521736.jpg', '2022-05-14', 0),
(8, 'Pierre', 'Soroy', 'pierre@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', '9 avenue de la paix', '0789987864', 'NULL', 'Je ne sais pas quoi écrire', 'NULL', '2022-05-31', 0),
(9, 'leAdmin', 'Admin', 'admin@gmail.com', '107d348bff437c999a9ff192adcb78cb03b8ddc6', '8 rue des admin', '0101010101', NULL, NULL, NULL, '2022-05-31', 1);

-- --------------------------------------------------------

--
-- Structure de la vue `events_users`
--
DROP TABLE IF EXISTS `events_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `events_users`  AS   (select `e`.`id` AS `id`,`e`.`titre` AS `titre`,`e`.`contenu` AS `contenu`,`e`.`url_video` AS `url_video`,`e`.`dateEvent` AS `dateEvent`,`e`.`dateCreationEvent` AS `dateCreationEvent`,`e`.`id_user` AS `id_user`,`u`.`nom` AS `nom`,`u`.`prenom` AS `prenom` from ((`evenement` `e` join `utilisateur` `u`) join `interest` `i`) where `e`.`id` = `i`.`id_event` and `u`.`id` = `i`.`id_user`)  ;

-- --------------------------------------------------------

--
-- Structure de la vue `messages_users`
--
DROP TABLE IF EXISTS `messages_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `messages_users`  AS   (select `m`.`id` AS `id`,`m`.`id_exp` AS `id_exp`,`m`.`id_dest` AS `id_dest`,`m`.`date_envoi` AS `date_envoi`,`m`.`contenu` AS `contenu`,`u1`.`nom` AS `nomE`,`u1`.`prenom` AS `prenomE`,`u2`.`nom` AS `nomR`,`u2`.`prenom` AS `prenomR` from ((`message` `m` join `utilisateur` `u1`) join `utilisateur` `u2`) where `u1`.`id` = `m`.`id_exp` and `u2`.`id` = `m`.`id_dest`)  ;

--
-- Index pour les tables déchargées
--

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
  ADD PRIMARY KEY (`id_followed`,`id_follower`),
  ADD KEY `id_exp` (`id_follower`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id_user`,`id_event`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`id_exp`,`id_dest`),
  ADD KEY `id_dest` (`id_dest`),
  ADD KEY `message_ibfk_1` (`id_exp`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `follower`
--
ALTER TABLE `follower`
  ADD CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`id_followed`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `follower_ibfk_2` FOREIGN KEY (`id_follower`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interest_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_exp`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_dest`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
