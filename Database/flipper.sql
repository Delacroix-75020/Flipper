Drop Database flipper;
CREATE Database flipper;
use flipper;

CREATE TABLE `utilisateur` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
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
 PRIMARY KEY (`id`),
 UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;	


  CREATE TABLE evenement (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `titre` varchar(255) DEFAULT NULL,
 `contenu` text DEFAULT NULL,
 `url_video` text DEFAULT NULL,
 `dateEvent` date NOT NULL,
 `dateCreationEvent` date DEFAULT NULL,
 `id_user` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `id_user` (`id_user`),
 CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

CREATE TABLE follower (
 `id_followed` int(11) NOT NULL,
 `id_follower` int(11) NOT NULL,
 PRIMARY KEY (`id_followed`,`id_follower`),
 KEY `id_exp` (`id_follower`),
 CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`id_followed`) REFERENCES `utilisateur` (`id`),
 CONSTRAINT `follower_ibfk_2` FOREIGN KEY (`id_follower`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
	
CREATE TABLE image (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `lien` varchar(255) DEFAULT NULL,
 `id_event` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `id_event` (`id_event`),
 CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE interest (
 `id_user` int(11) NOT NULL,
 `id_event` int(11) NOT NULL,
 PRIMARY KEY (`id_user`,`id_event`),
 KEY `id_event` (`id_event`),
 CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`),
 CONSTRAINT `interest_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `message` (
 `id_exp` int(11) NOT NULL,
 `id_dest` int(11) NOT NULL,
 `contenu` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id_exp`,`id_dest`),
 KEY `id_dest` (`id_dest`),
 CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_exp`) REFERENCES `utilisateur` (`id`),
 CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_dest`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

