-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 01 avr. 2022 à 14:04
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cubeweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_nom` varchar(50) NOT NULL,
  `contact_mail` varchar(50) NOT NULL,
  `contact_msg` varchar(500) NOT NULL,
  `contact_date` varchar(20) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_nom`, `contact_mail`, `contact_msg`, `contact_date`, `utilisateur_id`) VALUES
(1, 'matheo', 'matheo', 'salut salut', '17/03/2022', 1),
(2, 'ilan', 'ilan', 'ilan\r\n', '17/03/2022', 1),
(3, 'sa', 'sa', 'sa', '17/03/2022', 1),
(4, 'ilan', 'mail', 'salutsalut', '18/03/2022', 1),
(5, 'il', 'il', 'il', '18/03/2022', 1),
(6, 'dza', 'dza', 'fez', '18/03/2022', 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum_article`
--

CREATE TABLE `forum_article` (
  `article_id` int(11) NOT NULL,
  `article_sujet` varchar(50) NOT NULL,
  `article_date` varchar(50) NOT NULL,
  `article_msg` varchar(400) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum_article`
--

INSERT INTO `forum_article` (`article_id`, `article_sujet`, `article_date`, `article_msg`, `utilisateur_id`, `jeux_id`) VALUES
(2, 'Loterie : Je trouve ce jeux incroyable !', '16/03/2022', 'Salut je voulais partager que je trouve ce jeux incroyable ! j\'attends avec impatience le 2 et vous?', 1, 1),
(3, 'Enorme Bug', '16/03/2022', 'Je vous fait part d\'un bug sur le jeux Loterie merci de le resoudre ASAP', 1, 1),
(9, 'wayan', '17/03/2022', 'wayan', 1, 1),
(11, 'siujet', '18/03/2022', 'sujet', 1, 1),
(12, 'dza', '18/03/2022', 'za', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum_msg`
--

CREATE TABLE `forum_msg` (
  `msg_id` int(11) NOT NULL,
  `msg_msg` varchar(400) NOT NULL,
  `msg_date` varchar(15) NOT NULL,
  `article_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum_msg`
--

INSERT INTO `forum_msg` (`msg_id`, `msg_msg`, `msg_date`, `article_id`, `utilisateur_id`) VALUES
(2, 'Je suis bien d\'accord', '16/03/2022', 2, 1),
(3, 'Tu as tord', '16/03/2022', 2, 1),
(26, 'oui\r\n', '18/03/2022', 2, 1),
(27, '5', '18/03/2022', 9, 1),
(28, 'salut david', '18/03/2022', 9, 1),
(29, 'za', '18/03/2022', 9, 2),
(30, 'ntm\r\n', '18/03/2022', 3, 2),
(31, 'trevor fdp\r\n', '18/03/2022', 3, 2),
(32, 'salut\r\n', '18/03/2022', 9, 2),
(33, 'ui', '18/03/2022', 11, 2),
(34, 'zadq', '18/03/2022', 12, 2),
(35, 'salut anais\r\n', '22/03/2022', 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL,
  `info_nom` varchar(50) NOT NULL,
  `info_prenom` varchar(50) NOT NULL,
  `info_img` varchar(50) NOT NULL,
  `info_description` varchar(200) NOT NULL,
  `info_date_naissance` varchar(15) NOT NULL,
  `info_date_inscription` varchar(15) NOT NULL,
  `info_derniere_connexion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `info`
--

INSERT INTO `info` (`info_id`, `info_nom`, `info_prenom`, `info_img`, `info_description`, `info_date_naissance`, `info_date_inscription`, `info_derniere_connexion`) VALUES
(1, 'loore', 'ilan', './imgilan.png', 'Salut ! je suis fan de PHP et de BDD, c\'est vraiment ma plus grande passion !!!', '14/05/1995', '16/03/2022', '16/03/2022'),
(2, 'lansonneur', 'david', './imgdavid.png', 'je suis david', '05/09/1995', '17/03/2022', '17/03/2022');

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `jeux_id` int(11) NOT NULL,
  `jeux_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`jeux_id`, `jeux_nom`) VALUES
(1, 'Loterie');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `score_score` int(11) NOT NULL,
  `score_date` varchar(15) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `jeux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`score_id`, `score_score`, `score_date`, `utilisateur_id`, `jeux_id`) VALUES
(1, 5, '17/03/2022', 1, 1),
(2, 4, '17/03/2022', 2, 1),
(3, 10, '17/03/2022', 2, 1),
(4, 1, '18/03/2022', 1, 1),
(5, 25, '18/03/2022', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `utilisateur_pseudo` varchar(50) NOT NULL,
  `utilisateur_mail` varchar(50) NOT NULL,
  `utilisateur_password` varchar(50) NOT NULL,
  `info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `utilisateur_pseudo`, `utilisateur_mail`, `utilisateur_password`, `info_id`) VALUES
(1, 'ilan7', 'ilan.loore@viacesi.fr', 'mdp', 1),
(2, 'sheyshey', 'david@leboss.fr', 'mdp', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `fk_utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index pour la table `forum_article`
--
ALTER TABLE `forum_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `fk_article_utilisateur_id` (`utilisateur_id`),
  ADD KEY `fk_article_jeux_id` (`jeux_id`);

--
-- Index pour la table `forum_msg`
--
ALTER TABLE `forum_msg`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `fk_msg_utilisateur_id` (`utilisateur_id`),
  ADD KEY `fk_msg_article_id` (`article_id`);

--
-- Index pour la table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`jeux_id`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `fk_score_utilisateur_id` (`utilisateur_id`),
  ADD KEY `fk_score_jeux_id` (`jeux_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD UNIQUE KEY `utilisateur_pseudo` (`utilisateur_pseudo`),
  ADD KEY `fk_info_id` (`info_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `forum_article`
--
ALTER TABLE `forum_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `forum_msg`
--
ALTER TABLE `forum_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `jeux_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `forum_article`
--
ALTER TABLE `forum_article`
  ADD CONSTRAINT `fk_article_jeux_id` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`jeux_id`),
  ADD CONSTRAINT `fk_article_utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `forum_msg`
--
ALTER TABLE `forum_msg`
  ADD CONSTRAINT `fk_msg_article_id` FOREIGN KEY (`article_id`) REFERENCES `forum_article` (`article_id`),
  ADD CONSTRAINT `fk_msg_utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `fk_score_jeux_id` FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`jeux_id`),
  ADD CONSTRAINT `fk_score_utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_info_id` FOREIGN KEY (`info_id`) REFERENCES `info` (`info_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
