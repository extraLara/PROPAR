-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 09 sep. 2020 à 22:12
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `propar`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(20) NOT NULL,
  `name` tinytext COLLATE utf8_bin NOT NULL,
  `firstname` varchar(20) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `firstname`, `mail`) VALUES
(2, 'VALEMBOIS', 'BEN', 'BEN@CLIENT.FR');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(20) NOT NULL,
  `name` tinytext COLLATE utf8_bin NOT NULL,
  `firstname` tinytext COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `role` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id_employee`, `name`, `firstname`, `login`, `password`, `mail`, `role`) VALUES
(1, 'Rosa', 'Parks', 'expert01', '21232f297a57a5a743894a0e4a801fc3', 'rosa.parks@gmail.com', '1'),
(2, 'Doe', 'Annabelle', 'senior01', '69770578623de6b8302802d4274c4bbb', 'doe.annabelle@hotmail.fr', '2'),
(3, 'Smith', 'Will', 'expert02', '3cf6672047712163f019358cb6719d06', 'will.smith@propar.fr', '1'),
(4, 'Dugrand', 'Lucas', 'apprenti01', 'cb6c096e7030e26478e2e250ba2ca548', 'lucas.dugrand@propar.fr', '3'),
(5, 'Bailey', 'Miranda', 'expert03', 'b840069b158fd0486cde0d144169bda8', 'miranda.bailey@propar.fr', '1'),
(6, 'Grey', 'Meredith', 'senior02', '1d7f55f44c88c7deaf590678b91f1cce', 'Meredith.Grey@propar.fr', '2');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(20) NOT NULL,
  `label` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `date_progress` date DEFAULT NULL,
  `id_type` int(20) NOT NULL,
  `id_customer` int(20) NOT NULL,
  `id_employee` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id_task`, `label`, `description`, `date_begin`, `date_end`, `date_progress`, `id_type`, `id_customer`, `id_employee`) VALUES
(1, 'LAVAGE', 'LAVER LE SOL', '2020-09-09', '2020-09-09', NULL, 3, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(20) NOT NULL,
  `label` varchar(50) COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `label`, `price`) VALUES
(1, 'Grosse', 10000),
(2, 'Moyenne', 2500),
(3, 'Petit manoeuvres', 1000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `Tasks_fk0` (`id_type`),
  ADD KEY `Tasks_fk1` (`id_customer`),
  ADD KEY `Tasks_fk2` (`id_employee`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
